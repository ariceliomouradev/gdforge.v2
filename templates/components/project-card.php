<?php declare(strict_types=1); ?>
<a href="<?= escape($project['url']) ?>" target="_blank" rel="noopener noreferrer" class="game-card hover-target gs-up">
    <div class="game-card-img">
        <img src="<?= escape($project['image']) ?>" alt="<?= escape($project['image_alt']) ?>" loading="lazy" decoding="async" width="<?= (int) $project['image_width'] ?>" height="<?= (int) $project['image_height'] ?>">
    </div>
    <div class="game-info">
        <h<?= $headingLevel ?>><?= escape($project['name']) ?></h<?= $headingLevel ?>>
        <p><?= escape($project['description']) ?></p>
        <span class="badge"><?php render('components/project-icon', ['icon' => $project['icon']]); ?> <?= escape($project['genre']) ?></span>
    </div>
</a>
