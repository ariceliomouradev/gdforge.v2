<?php
declare(strict_types=1);

namespace GDForge\Content;

use DateTimeImmutable;
use DateTimeZone;
use InvalidArgumentException;

/** Read-only editorial catalog. Never derives a filesystem path from a request. */
final class PostCatalog
{
    public const CATEGORIES = [
        'gameplay-studio' => 'Gameplay Studio',
        'jogos-gdforge' => 'Jogos GDForge',
        'bastidores-da-forja' => 'Bastidores da Forja',
    ];

    public static function slug(string $value): bool
    {
        return strlen($value) <= 100 && preg_match('/\A[a-z0-9]+(?:-[a-z0-9]+)*\z/D', $value) === 1;
    }

    public static function date(string $value): DateTimeImmutable
    {
        $date = DateTimeImmutable::createFromFormat('!Y-m-d', $value, new DateTimeZone('America/Sao_Paulo'));
        if (!$date || $date->format('Y-m-d') !== $value) {
            throw new InvalidArgumentException('Invalid editorial date.');
        }
        return $date;
    }

    public static function load(string $directory, ?DateTimeImmutable $now = null): array
    {
        $now ??= new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo'));
        $visible = [];
        $seen = [];
        foreach (glob($directory . '/*.json') ?: [] as $file) {
            if (filesize($file) > 262144) {
                throw new InvalidArgumentException('Post exceeds size limit.');
            }
            $post = json_decode((string) file_get_contents($file), true, 32, JSON_THROW_ON_ERROR);
            self::validate($post);
            if (isset($seen[$post['slug']])) {
                throw new InvalidArgumentException('Duplicate editorial slug.');
            }
            $seen[$post['slug']] = true;
            if ($post['status'] === 'published' && self::date($post['date']) <= $now) {
                $visible[] = $post;
            }
        }
        usort($visible, static fn(array $a, array $b): int => strcmp($b['date'], $a['date']) ?: strcmp($a['slug'], $b['slug']));
        return $visible;
    }

    public static function validate(mixed $post): void
    {
        if (!is_array($post)) {
            throw new InvalidArgumentException('Post must be an object.');
        }
        foreach (['slug', 'title', 'excerpt', 'description', 'category', 'date', 'status', 'author'] as $field) {
            if (!isset($post[$field]) || !is_string($post[$field]) || trim($post[$field]) === '' || strlen($post[$field]) > 2000) {
                throw new InvalidArgumentException('Missing or invalid editorial field.');
            }
        }
        if (!self::slug($post['slug']) || !isset(self::CATEGORIES[$post['category']]) || !in_array($post['status'], ['draft', 'published'], true)) {
            throw new InvalidArgumentException('Invalid editorial metadata.');
        }
        $published = self::date($post['date']);
        if (isset($post['updated_at']) && (!is_string($post['updated_at']) || self::date($post['updated_at']) < $published)) {
            throw new InvalidArgumentException('Invalid modification date.');
        }
        if (isset($post['image'])) {
            if (!is_string($post['image']) || !preg_match('~\A/assets/images/[a-zA-Z0-9_/-]+\.(png|jpe?g|webp|avif|svg|gif)\z~D', $post['image']) || str_contains($post['image'], '..') || !is_file(dirname(__DIR__, 2) . '/public' . $post['image']) || !isset($post['image_alt']) || !is_string($post['image_alt']) || trim($post['image_alt']) === '') {
                throw new InvalidArgumentException('Invalid editorial image.');
            }
        }
        if (!isset($post['blocks']) || !is_array($post['blocks']) || !array_is_list($post['blocks']) || count($post['blocks']) < 1 || count($post['blocks']) > 200) {
            throw new InvalidArgumentException('Invalid editorial blocks.');
        }
        foreach ($post['blocks'] as $block) {
            if (!is_array($block) || !isset($block['type']) || !in_array($block['type'], ['paragraph', 'heading', 'list', 'quote', 'code', 'link', 'image'], true)) {
                throw new InvalidArgumentException('Unsupported editorial block.');
            }
            if ($block['type'] === 'list') {
                if (!isset($block['items']) || !is_array($block['items']) || !array_is_list($block['items']) || count($block['items']) < 1 || count($block['items']) > 50) {
                    throw new InvalidArgumentException('Invalid list.');
                }
                foreach ($block['items'] as $item) {
                    if (!is_string($item) || trim($item) === '' || strlen($item) > 10000) {
                        throw new InvalidArgumentException('Invalid list item.');
                    }
                }
            } elseif ($block['type'] === 'image') {
                $src = $block['src'] ?? $block['url'] ?? null;
                if (!is_string($src) || !preg_match('~\A/assets/images/[a-zA-Z0-9_/-]+\.(png|jpe?g|webp|avif|svg|gif)\z~D', $src) || str_contains($src, '..')) {
                    throw new InvalidArgumentException('Invalid block image path.');
                }
                if (!is_file(dirname(__DIR__, 2) . '/public' . $src)) {
                    throw new InvalidArgumentException('Block image does not exist on disk.');
                }
                if (!isset($block['alt']) || !is_string($block['alt']) || trim($block['alt']) === '') {
                    throw new InvalidArgumentException('Missing or invalid image alt.');
                }
                $caption = $block['caption'] ?? $block['text'] ?? null;
                if ($caption !== null && (!is_string($caption) || strlen($caption) > 10000)) {
                    throw new InvalidArgumentException('Invalid block image caption.');
                }
            } elseif (!isset($block['text']) || !is_string($block['text']) || trim($block['text']) === '' || strlen($block['text']) > 20000) {
                throw new InvalidArgumentException('Invalid block text.');
            }
            if ($block['type'] === 'heading' && !in_array($block['level'] ?? null, [2, 3], true)) {
                throw new InvalidArgumentException('Invalid heading.');
            }
            if ($block['type'] === 'link') {
                $url = $block['url'] ?? null;
                $internal = is_string($url) && preg_match('~\A/(?:[a-z0-9-]+/?)*\z~D', $url);
                $external = is_string($url) && filter_var($url, FILTER_VALIDATE_URL) && parse_url($url, PHP_URL_SCHEME) === 'https' && !isset(parse_url($url)['user']);
                if (!$internal && !$external) {
                    throw new InvalidArgumentException('Invalid link protocol or destination.');
                }
            }
        }
    }

    public static function page(array $posts, ?string $category, int $page, int $perPage = 6): array
    {
        if ($page < 1 || $perPage < 1 || ($category !== null && !isset(self::CATEGORIES[$category]))) {
            throw new InvalidArgumentException('Invalid editorial page.');
        }
        $filtered = array_values(array_filter($posts, static fn(array $post): bool => $category === null || $post['category'] === $category));
        $pages = max(1, (int) ceil(count($filtered) / $perPage));
        return ['items' => array_slice($filtered, ($page - 1) * $perPage, $perPage), 'pages' => $pages, 'valid' => $page <= $pages];
    }
}
