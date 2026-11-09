<?php declare(strict_types=1); ?>
<nav class="category-filter" aria-label="Categorias do Devlog">
    <a href="/devlog" <?= $category === null ? 'aria-current="page"' : '' ?>>Todas</a>
    <?php foreach ($categories as $slug => $name): ?>
        <a href="/devlog/categoria/<?= escape($slug) ?>" <?= $category === $slug ? 'aria-current="page"' : '' ?>><?= escape($name) ?></a>
    <?php endforeach; ?>
</nav>
<?php if ($listing['items'] === []): ?>
<div class="editorial-empty"><h2><?= $category === null ? 'Novos registros estão por vir' : 'Ainda não há artigos nesta categoria' ?></h2><p>Enquanto os próximos textos são preparados, explore os protótipos e os registros visuais do laboratório.</p><a class="text-link" href="/projetos">Conhecer os protótipos →</a></div>
<?php else: ?>
<div class="post-grid">
    <?php foreach ($listing['items'] as $post): ?>
    <article class="post-card">
        <?php if (isset($post['image'])): ?><img src="<?= escape($post['image']) ?>" alt="<?= escape($post['image_alt']) ?>" loading="lazy" decoding="async"><?php endif; ?>
        <div class="post-card-body"><p class="post-meta"><?= escape($categories[$post['category']]) ?> · <time datetime="<?= escape($post['date']) ?>"><?= date('d/m/Y', strtotime($post['date'])) ?></time></p><h2><a href="/devlog/<?= escape($post['slug']) ?>"><?= escape($post['title']) ?></a></h2><p><?= escape($post['excerpt']) ?></p><a class="text-link" href="/devlog/<?= escape($post['slug']) ?>">Ler artigo<span class="sr-only">: <?= escape($post['title']) ?></span> →</a></div>
    </article>
    <?php endforeach; ?>
</div>
<?php if ($listing['pages'] > 1): ?>
<nav class="pagination" aria-label="Paginação do Devlog">
    <?php if ($pageNumber > 1): ?><a href="<?= escape($path . ($pageNumber === 2 ? '' : '?page=' . ($pageNumber - 1))) ?>">← Anterior</a><?php endif; ?>
    <span aria-current="page">Página <?= $pageNumber ?> de <?= $listing['pages'] ?></span>
    <?php if ($pageNumber < $listing['pages']): ?><a href="<?= escape($path . '?page=' . ($pageNumber + 1)) ?>">Próxima →</a><?php endif; ?>
</nav>
<?php endif; ?>
<?php endif; ?>
