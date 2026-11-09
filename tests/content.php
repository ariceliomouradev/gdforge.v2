<?php
declare(strict_types=1);
require dirname(__DIR__) . '/src/Content/PostCatalog.php';
require dirname(__DIR__) . '/src/view.php';
use GDForge\Content\PostCatalog;

$checks = 0;
function check(bool $condition, string $label): void {
    global $checks;
    if (!$condition) { throw new RuntimeException('FAIL: ' . $label); }
    $checks++;
}
function rejects(callable $action, string $label): void {
    try { $action(); } catch (InvalidArgumentException|JsonException) { check(true, $label); return; }
    check(false, $label);
}
$fixture = [
    'slug' => 'artigo-de-teste', 'title' => '<script>alert(1)</script>',
    'excerpt' => 'Resumo', 'description' => 'Descrição', 'category' => 'gameplay-studio',
    'date' => '2026-11-01', 'status' => 'published', 'author' => 'GDForge',
    'blocks' => [['type' => 'paragraph', 'text' => '<img src=x onerror=alert(1)>']],
];
PostCatalog::validate($fixture);
check(PostCatalog::slug('salto-2d'), 'valid slug');
foreach (['../segredo', 'a/b', 'a--b', '%2e%2e', ''] as $slug) { check(!PostCatalog::slug($slug), 'invalid slug'); }
rejects(fn() => PostCatalog::date('2026-02-30'), 'impossible date');
foreach (['javascript:alert(1)', 'data:text/html,test', '//example.com', '/a/../secret', 'https://user:pass@example.com'] as $url) {
    $bad = $fixture; $bad['blocks'] = [['type' => 'link', 'text' => 'Link', 'url' => $url]];
    rejects(fn() => PostCatalog::validate($bad), 'unsafe link');
}
$bad = $fixture; $bad['blocks'] = [['type' => 'heading', 'level' => 1, 'text' => 'Duplicate H1']];
rejects(fn() => PostCatalog::validate($bad), 'H1 not allowed in blocks');
$bad = $fixture; $bad['image'] = '/assets/images/../../secret.png'; $bad['image_alt'] = 'x';
rejects(fn() => PostCatalog::validate($bad), 'image traversal');
$bad = $fixture; $bad['blocks'] = [['type' => 'image', 'src' => '/assets/images/../../secret.png', 'alt' => 'x']];
rejects(fn() => PostCatalog::validate($bad), 'image block traversal');
$bad = $fixture; $bad['blocks'] = [['type' => 'image', 'src' => '/assets/images/nao-existe.png', 'alt' => 'x']];
rejects(fn() => PostCatalog::validate($bad), 'image block missing file');
$bad = $fixture; $bad['blocks'] = [['type' => 'image', 'src' => '/assets/images/devlog/coyote-time-demo.gif']];
rejects(fn() => PostCatalog::validate($bad), 'image block missing alt');
$good = $fixture; $good['blocks'] = [['type' => 'image', 'src' => '/assets/images/devlog/coyote-time-demo.gif', 'alt' => 'Demo', 'caption' => 'Legenda']];
PostCatalog::validate($good);
$checks++;
$bad = $fixture; $bad['blocks'] = [['type' => 'html', 'text' => '<script>']];
rejects(fn() => PostCatalog::validate($bad), 'raw HTML block');
$bad = $fixture; $bad['updated_at'] = '2026-10-01';
rejects(fn() => PostCatalog::validate($bad), 'modification before publication');
$directory = sys_get_temp_dir() . '/gdforge-post-test-' . bin2hex(random_bytes(6));
mkdir($directory);
try {
    file_put_contents($directory . '/published.json', json_encode($fixture));
    $draft = $fixture; $draft['slug'] = 'draft'; $draft['status'] = 'draft';
    file_put_contents($directory . '/draft.json', json_encode($draft));
    $future = $fixture; $future['slug'] = 'future'; $future['date'] = '2026-11-02';
    file_put_contents($directory . '/future.json', json_encode($future));
    $now = new DateTimeImmutable('2026-11-01T12:00:00-03:00');
    $visible = PostCatalog::load($directory, $now);
    check(count($visible) === 1 && $visible[0]['slug'] === 'artigo-de-teste', 'drafts and future hidden');
    $older = $fixture; $older['slug'] = 'older'; $older['date'] = '2026-10-31';
    file_put_contents($directory . '/older.json', json_encode($older));
    $visible = PostCatalog::load($directory, $now);
    check($visible[0]['date'] === '2026-11-01', 'newest first');
    check(PostCatalog::page($visible, null, 1, 1)['pages'] === 2, 'pagination count');
    check(PostCatalog::page($visible, null, 2, 1)['items'][0]['slug'] === 'older', 'pagination slice');
    check(!PostCatalog::page($visible, null, 3, 1)['valid'], 'out of bounds');
    check(PostCatalog::page($visible, 'jogos-gdforge', 1)['items'] === [], 'empty category');
    file_put_contents($directory . '/duplicate.json', json_encode($fixture));
    rejects(fn() => PostCatalog::load($directory, $now), 'duplicate slug');
    unlink($directory . '/duplicate.json');
    file_put_contents($directory . '/invalid.json', '{');
    rejects(fn() => PostCatalog::load($directory, $now), 'invalid JSON');
    $article = $fixture; $categories = PostCatalog::CATEGORIES; $related = [];
    ob_start(); render('components/article', compact('article', 'categories', 'related')); $html = ob_get_clean();
    check(!str_contains($html, '<script>') && !str_contains($html, '<img src=x'), 'text and title escaped');
    check(str_contains($html, '&lt;script&gt;') && str_contains($html, '&lt;img'), 'escaped content preserved');
} finally {
    foreach (glob($directory . '/*.json') ?: [] as $file) { unlink($file); }
    rmdir($directory);
}
echo 'OK: ' . $checks . ' verificações editoriais.' . PHP_EOL;
