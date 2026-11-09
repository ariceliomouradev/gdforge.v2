<?php
declare(strict_types=1);
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
require dirname(__DIR__) . '/src/view.php';
require dirname(__DIR__) . '/src/Content/PostCatalog.php';
use GDForge\Content\PostCatalog;
$slug = $argv[1] ?? '';
if (!PostCatalog::slug($slug)) { fwrite(STDERR, "Informe um slug válido.\n"); exit(1); }
$article = null;
foreach (glob(dirname(__DIR__) . '/content/posts/*.json') ?: [] as $file) {
    $candidate = json_decode((string) file_get_contents($file), true, 32, JSON_THROW_ON_ERROR);
    PostCatalog::validate($candidate);
    if ($candidate['slug'] === $slug) { $article = $candidate; break; }
}
if ($article === null) { fwrite(STDERR, "Artigo não encontrado.\n"); exit(1); }
$categories = PostCatalog::CATEGORIES;
$related = [];
$path = '/devlog/' . $slug;
$title = 'Rascunho — ' . $article['title'];
$description = $article['description'];
$found = true;
$preview = true;
$canonicalPath = $path;
ob_start();
render('components/head', compact('title', 'description', 'found', 'path', 'canonicalPath', 'article', 'preview'));
$head = ob_get_clean();
ob_start();
render('components/header', ['path' => $path]);
echo '<main id="conteudo"><p class="preview-banner">RASCUNHO — Conteúdo proposto para revisão. Não publicado no Devlog.</p>';
render('components/article', compact('article', 'categories', 'related'));
echo '</main>';
render('components/footer', []);
$body = ob_get_clean();
$html = '<!doctype html><html lang="pt-BR">' . $head . '<body>' . $body . '</body></html>';
$html = preg_replace('~href="/(?!assets/)~', 'href="http://127.0.0.1:8081/', $html);
$directory = dirname(__DIR__) . '/.runtime/editorial-preview';
if (!is_dir($directory)) { mkdir($directory, 0700, true); }
foreach (['assets', 'assets/fonts', 'assets/images'] as $subdirectory) {
    if (!is_dir($directory . '/' . $subdirectory)) { mkdir($directory . '/' . $subdirectory, 0700, true); }
}
$assets = ['assets/site.css', 'assets/site.js', 'assets/images/gd-forge-logo-1.png'];
if (isset($article['image'])) { $assets[] = ltrim($article['image'], '/'); }
foreach ($article['blocks'] as $block) {
    if (($block['type'] ?? '') === 'image') {
        $imgSrc = $block['src'] ?? $block['url'] ?? null;
        if (is_string($imgSrc)) {
            $assets[] = ltrim($imgSrc, '/');
        }
    }
}
foreach (glob(dirname(__DIR__) . '/public/assets/fonts/*') ?: [] as $font) { $assets[] = 'assets/fonts/' . basename($font); }
foreach ($assets as $asset) {
    $srcFile = dirname(__DIR__) . '/public/' . $asset;
    $dstFile = $directory . '/' . $asset;
    if (is_file($srcFile)) {
        $targetDir = dirname($dstFile);
        if (!is_dir($targetDir)) { mkdir($targetDir, 0700, true); }
        copy($srcFile, $dstFile);
    }
}
file_put_contents($directory . '/index.html', $html);
echo "Preview gerado em .runtime/editorial-preview/index.html\n";
