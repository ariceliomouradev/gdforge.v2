<?php declare(strict_types=1); ?>
<header class="site-header">
    <a href="/" class="logo" aria-label="GDForge — início"><img src="/assets/images/gd-forge-logo-1.png" width="40" height="40" alt=""><span class="logo-text">GD<span class="highlight">Forge</span></span></a>
    <button class="hamburger menu-toggle" type="button" aria-label="Abrir menu" aria-controls="navigation" aria-expanded="false" hidden><span class="bar"></span><span class="bar"></span><span class="bar"></span></button>
    <nav id="navigation" aria-label="Principal">
        <ul>
            <?php foreach (['sobre' => 'Sobre a Forja', 'projetos' => 'Protótipos', 'gameplay-studio' => 'Gameplay Studio', 'devlog' => 'DevLog', 'contato' => 'Contato'] as $slug => $name): ?>
                <?php
                $url = '/' . $slug;
                $isPage = $path === $url;
                $isSection = in_array($slug, ['projetos', 'devlog'], true) && str_starts_with($path, $url . '/');
                $href = $path === '/' && $slug !== 'gameplay-studio' ? '#' . $slug : $url;
                ?>
                <li><a class="nav-link" href="<?= escape($href) ?>"<?php if ($isPage || $isSection): ?> aria-current="<?= $isPage ? 'page' : 'location' ?>"<?php endif; ?>><?= escape($name) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
