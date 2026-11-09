<?php declare(strict_types=1); ?>
<section class="container standalone">
    <h1 class="section-title"><?= escape($project['name']) ?></h1>
    <div class="about-box">
        <img class="detail-cover" src="<?= escape($project['image']) ?>" alt="Capa de <?= escape($project['name']) ?>" width="<?= (int) $project['image_width'] ?>" height="<?= (int) $project['image_height'] ?>">
        <span class="badge"><?= escape($project['genre']) ?></span>
        <p class="detail-copy"><?= escape($project['description']) ?></p>
        <a class="btn" href="<?= escape($project['url']) ?>" target="_blank" rel="noopener noreferrer">Conhecer no itch.io ↗</a>
        <p><a class="text-link" href="/projetos">← Todos os protótipos</a></p>
    </div>
</section>
