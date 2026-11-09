<?php declare(strict_types=1); ?>
<article class="container standalone article-page">
    <nav class="breadcrumbs" aria-label="Caminho de navegação"><a href="/">Início</a> / <a href="/devlog">Devlog</a> / <a href="/devlog/categoria/<?= escape($article['category']) ?>"><?= escape($categories[$article['category']]) ?></a></nav>
    <header class="article-header"><p class="post-meta"><?= escape($categories[$article['category']]) ?></p><h1><?= escape($article['title']) ?></h1><p class="article-excerpt"><?= escape($article['excerpt']) ?></p><p class="post-meta">Por <?= escape($article['author']) ?> · <time datetime="<?= escape($article['date']) ?>"><?= date('d/m/Y', strtotime($article['date'])) ?></time><?php if (isset($article['updated_at'])): ?> · Atualizado em <time datetime="<?= escape($article['updated_at']) ?>"><?= date('d/m/Y', strtotime($article['updated_at'])) ?></time><?php endif; ?></p></header>
    <?php if (isset($article['image'])): ?><img class="article-cover" src="<?= escape($article['image']) ?>" alt="<?= escape($article['image_alt']) ?>" decoding="async"><?php endif; ?>
    <div class="article-body">
    <?php foreach ($article['blocks'] as $block): ?>
        <?php switch ($block['type']): case 'paragraph': ?><p><?= escape($block['text']) ?></p><?php break; case 'heading': ?><h<?= $block['level'] ?>><?= escape($block['text']) ?></h<?= $block['level'] ?>><?php break; case 'list': ?><ul><?php foreach ($block['items'] as $item): ?><li><?= escape($item) ?></li><?php endforeach; ?></ul><?php break; case 'quote': ?><blockquote><p><?= escape($block['text']) ?></p></blockquote><?php break; case 'code': ?><pre><code><?= escape($block['text']) ?></code></pre><?php break; case 'link': ?><p><a href="<?= escape($block['url']) ?>"><?= escape($block['text']) ?></a></p><?php break; case 'image': ?><figure class="article-figure"><img src="<?= escape($block['src'] ?? $block['url'] ?? '') ?>" alt="<?= escape($block['alt'] ?? '') ?>" loading="lazy" decoding="async"><?php $caption = $block['caption'] ?? $block['text'] ?? ''; if ($caption !== ''): ?><figcaption><?= escape($caption) ?></figcaption><?php endif; ?></figure><?php break; endswitch; ?>
    <?php endforeach; ?>
    </div>
    <p><a class="text-link" href="/devlog">← Todos os artigos</a></p>
    <?php if ($related !== []): ?><aside class="related-posts"><h2>Continue explorando</h2><ul><?php foreach ($related as $post): ?><li><a class="text-link" href="/devlog/<?= escape($post['slug']) ?>"><?= escape($post['title']) ?></a></li><?php endforeach; ?></ul></aside><?php endif; ?>
</article>
