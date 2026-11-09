<?php
declare(strict_types=1);

use GDForge\Content\PostCatalog;

require dirname(__DIR__) . '/src/view.php';
require dirname(__DIR__) . '/src/Content/PostCatalog.php';
header('Content-Type: text/html; charset=UTF-8');
header("Content-Security-Policy: default-src 'none'; style-src 'self'; script-src 'self'; img-src 'self'; font-src 'self'; base-uri 'none'; frame-ancestors 'none'; form-action 'none'");
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
header('X-Frame-Options: DENY');
date_default_timezone_set('America/Sao_Paulo');

$projects = require dirname(__DIR__) . '/src/projects.php';
$categories = PostCatalog::CATEGORIES;
$productInfo = require dirname(__DIR__) . '/src/product.php';
try {
    $posts = PostCatalog::load(dirname(__DIR__) . '/content/posts');
} catch (Throwable) {
    error_log('GDForge: editorial catalog validation failed.');
    http_response_code(503);
    header('Retry-After: 3600');
    header('X-Robots-Tag: noindex');
    echo '<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Temporariamente indisponível | GDForge</title><h1>Voltamos em breve</h1><p>Não foi possível carregar o conteúdo. Tente novamente mais tarde.</p></html>';
    exit;
}
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$path = is_string($path) ? $path : '';
if (strlen($path) > 1 && str_ends_with($path, '/')) {
    $cleanPath = rtrim($path, '/');
    $query = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? '?' . $_SERVER['QUERY_STRING'] : '';
    header('Location: ' . $cleanPath . $query, true, 301);
    exit;
}
if ($path === '/jogos') {
    header('Location: /projetos', true, 301);
    exit;
}
$pages = [
    '/' => ['Início', 'GDForge | Jogos indie, protótipos e game design', 'Laboratório independente de jogos, game design e ferramentas. Explore os protótipos e acompanhe a visão do GDForge Gameplay Studio.'],
    '/sobre' => ['Sobre a Forja', 'Sobre a Forja | GDForge', 'Conheça o laboratório GDForge: desenvolvimento solo, game design e experimentação de mecânicas e controles.'],
    '/projetos' => ['Protótipos', 'Protótipos de jogos indie | GDForge', 'Conheça Pongobo Arena, Root: Echoes of Shadows e Mimimiau, os protótipos apresentados pela GDForge.'],
    '/gameplay-studio' => ['Gameplay Studio', 'GDForge Gameplay Studio | Menos código. Mais gameplay.', 'Conheça a visão do GDForge Gameplay Studio: ferramentas e Smart Recipes para explorar a criação de gameplay em Godot.'],
    '/devlog' => ['Devlog', 'Devlog de desenvolvimento de jogos | GDForge', 'Artigos e bastidores da GDForge: jogos indie, ferramentas, game design e experimentos de gameplay.'],
    '/contato' => ['Contato', 'Contato e redes sociais | GDForge', 'Converse com a GDForge por e-mail e acompanhe os protótipos e bastidores no Instagram e no TikTok.'],
];
foreach ($projects as $candidate) {
    $pages['/projetos/' . $candidate['slug']] = [$candidate['name'], $candidate['name'] . ' | GDForge', $candidate['description']];
}
foreach ($categories as $slug => $name) {
    $pages['/devlog/categoria/' . $slug] = [$name, $name . ' | Devlog GDForge', 'Artigos e registros sobre ' . $name . ' no Devlog da GDForge.'];
}
foreach ($posts as $post) {
    $pages['/devlog/' . $post['slug']] = [$post['title'], $post['title'] . ' | GDForge', $post['description']];
}
if ($path === '/sitemap.xml') {
    header('Content-Type: application/xml; charset=UTF-8');
    render('sitemap', ['pages' => $pages]);
    exit;
}
if ($path === '/llms.txt') {
    header('Content-Type: text/plain; charset=UTF-8');
    echo "# GDForge\n\nLaboratório independente de jogos e ferramentas. Gameplay Studio é uma visão de produto; esta página não anuncia uma versão disponível.\n\n";
    foreach ($pages as $url => $metadata) {
        echo '- [' . str_replace(["\r", "\n", '[', ']'], '', $metadata[0]) . '](https://gdforge.com.br' . $url . ")\n";
    }
    exit;
}
$project = null;
foreach ($projects as $candidate) {
    if ($path === '/projetos/' . $candidate['slug']) {
        $project = $candidate;
        break;
    }
}
$article = null;
foreach ($posts as $post) {
    if ($path === '/devlog/' . $post['slug']) {
        $article = $post;
        break;
    }
}
$category = null;
foreach ($categories as $slug => $name) {
    if ($path === '/devlog/categoria/' . $slug) {
        $category = $slug;
        break;
    }
}
$isListing = $path === '/devlog' || $category !== null;
$pageInput = $_GET['page'] ?? '1';
$pageNumber = is_string($pageInput) && preg_match('/\A[1-9][0-9]{0,5}\z/D', $pageInput) ? (int) $pageInput : 0;
$listing = PostCatalog::page($posts, $category, max(1, $pageNumber));
$found = isset($pages[$path]) && (!$isListing || ($pageNumber > 0 && $listing['valid']));
if (!$found) {
    http_response_code(404);
    header('X-Robots-Tag: noindex');
}
[$label, $title, $description] = $found ? $pages[$path] : ['Página não encontrada', 'Página não encontrada | GDForge', 'O endereço solicitado não foi encontrado.'];
$canonicalPath = $path . ($isListing && $pageNumber > 1 ? '?page=' . $pageNumber : '');
if ($isListing && $pageNumber > 1 && $found) {
    $title = $label . ' — Página ' . $pageNumber . ' | GDForge';
    $description .= ' Página ' . $pageNumber . '.';
}
$related = $article === null ? [] : array_slice(array_values(array_filter($posts, static fn(array $post): bool => $post['category'] === $article['category'] && $post['slug'] !== $article['slug'])), 0, 3);
render('page', compact('path', 'projects', 'project', 'found', 'label', 'title', 'description', 'posts', 'categories', 'article', 'category', 'isListing', 'listing', 'pageNumber', 'canonicalPath', 'related', 'productInfo'));
