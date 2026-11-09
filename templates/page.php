<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="pt-BR">
<?php render('components/head', compact('title', 'description', 'found', 'path', 'canonicalPath', 'article')); ?>
<body>
<a class="skip" href="#conteudo">Pular para o conteúdo</a>
<div class="bg-grid" aria-hidden="true"></div>
<div class="custom-cursor" id="cursor" aria-hidden="true"></div>
<?php render('components/header', ['path' => $path]); ?>
<main id="conteudo">
<?php if (!$found): ?>
<section class="container standalone"><h1 class="section-title">Página não <span class="highlight">encontrada</span></h1><div class="about-box"><p>O endereço solicitado não foi encontrado.</p><a class="btn" href="/">Voltar ao início</a></div></section>
<?php elseif ($article !== null): ?>
<?php render('components/article', compact('article', 'categories', 'related')); ?>
<?php elseif ($path === '/gameplay-studio'): ?>
<?php render('components/gameplay-studio', compact('productInfo')); ?>
<?php elseif ($project !== null): ?>
<?php render('components/project-detail', ['project' => $project]); ?>
<?php else: ?>
<?php if ($path === '/contato'): ?>
<?php render('components/contact', []); ?>
<?php endif; ?>
    <!-- Hero Section -->
    <?php if ($path === '/'): ?>
<section class="hero" id="home">
        <img src="/assets/images/gd-forge-logo-1.png" alt="Símbolo GDForge" class="hero-logo gs-reveal" fetchpriority="high" decoding="async" width="346" height="328">
        <h1 class="gs-reveal">GD<span class="highlight">Forge</span></h1>
        <p class="hero-tagline gs-reveal">Forging Games &amp; Techniques</p>
        <a href="#projetos" class="btn hover-target gs-reveal mt-4">Forjar Aventura <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2c1 6-5 7-3 12 2-1 3-3 3-5 6 4 9 8 6 12-2 3-9 4-12 0-4-5 0-9 3-13-1 4 0 6 1 7C8 8 13 8 12 2Z"/></svg></a>
    </section>

<?php endif; ?>
<?php if ($path === '/' || $path === '/sobre'): ?>
    <!-- About Section -->
    <section class="container <?= $path !== '/' ? 'standalone' : '' ?>" id="sobre">
        <<?= $path === '/' ? 'h2' : 'h1' ?> class="section-title gs-up">Laboratório de <span class="highlight">Criação</span></<?= $path === '/' ? 'h2' : 'h1' ?>>
        <div class="about-box gs-up">
            <p>Olá! Eu sou um Dev Solo e aspirante a programador, mas acima de tudo, um <strong>Game Designer apaixonado.</strong></p>
            <p>A GD Forge é o meu laboratório. Aqui, meu foco não é criar a arte mais bonita, mas sim "martelar" o código até encontrar mecânicas viciantes, controles fluidos e aquela sensação boa de jogar (<strong>Game Feel</strong>).</p>
            <p><strong>Gosto de explorar gêneros clássicos com uma pegada moderna:</strong></p>
            <p>🕹️ Arcade & Roguelites<br>🗺️ Metroidvania<br>🏰 Tower Defense</p>
        </div>
    </section>

<?php endif; ?>
<?php if ($path === '/' || $path === '/projetos'): ?>
    <!-- Prototypes Section -->
    <section class="container <?= $path !== '/' ? 'standalone' : '' ?>" id="projetos">
        <<?= $path === '/' ? 'h2' : 'h1' ?> class="section-title gs-up">Protótipos <span class="highlight">Forjados</span></<?= $path === '/' ? 'h2' : 'h1' ?>>
        <div class="games-grid">
            <?php foreach ($projects as $cardProject): ?>
                <?php render('components/project-card', ['project' => $cardProject, 'headingLevel' => $path === '/' ? 3 : 2]); ?>
            <?php endforeach; ?>
        </div>
    </section>

<?php endif; ?>
<?php if ($path === '/'): ?>
<section class="container tools-preview" id="ferramentas"><h2 class="section-title">Ferramentas na <span class="highlight">forja</span></h2><div class="about-box"><span class="badge">Visão de produto</span><h3>GDForge Gameplay Studio</h3><p>Menos código. Mais gameplay. Conheça a proposta de ferramentas e Smart Recipes para explorar a criação de mecânicas em Godot.</p><a class="btn" href="/gameplay-studio">Conhecer a proposta</a></div></section>
<?php endif; ?>
<?php if ($path === '/' || $isListing): ?>
    <!-- Devlog / Gallery Section -->
    <section class="container gallery-section <?= $path !== '/' ? 'standalone' : '' ?>" id="devlog">
        <<?= $path === '/' ? 'h2' : 'h1' ?> class="section-title gs-up"><?php if ($category !== null): ?><?= escape($categories[$category]) ?> <span class="highlight">/ Devlog</span><?php else: ?>Diário do <span class="highlight">Desenvolvedor</span><?php endif; ?></<?= $path === '/' ? 'h2' : 'h1' ?>>
        <?php if ($isListing): ?>
        <?php render('components/post-list', compact('listing', 'categories', 'category', 'path', 'pageNumber')); ?>
        <h2 class="section-title gallery-heading">Bastidores <span class="highlight">visuais</span></h2>
        <?php else: ?>
        <p class="section-lead"><a class="text-link" href="/devlog">Explorar artigos e bastidores →</a></p>
        <?php if ($posts !== []): ?><div class="home-posts"><?php foreach (array_slice($posts, 0, 3) as $post): ?><article><p class="post-meta"><?= escape($categories[$post['category']]) ?></p><h3><a class="text-link" href="/devlog/<?= escape($post['slug']) ?>"><?= escape($post['title']) ?></a></h3><p><?= escape($post['excerpt']) ?></p></article><?php endforeach; ?></div><?php endif; ?>
        <?php endif; ?>
        <div class="gallery-grid">
            <div class="gallery-item hover-target gs-up"><img src="/assets/images/insta-1.jpg" alt="Registro de desenvolvimento de Space Shooter — imagem 1" loading="lazy" decoding="async" width="505" height="839"><div class="gallery-overlay"><span><span aria-hidden="true">〈/〉</span> SPACE SHOOTER</span></div></div>
            <div class="gallery-item hover-target gs-up"><img src="/assets/images/insta-2.jpg" alt="Registro de desenvolvimento de Space Shooter — imagem 2" loading="lazy" decoding="async" width="503" height="840"><div class="gallery-overlay"><span><span aria-hidden="true">〈/〉</span> SPACE SHOOTER</span></div></div>
            <div class="gallery-item hover-target gs-up"><img src="/assets/images/insta-3.jpg" alt="Registro de desenvolvimento do Jogo do Pássaro" loading="lazy" decoding="async" width="505" height="841"><div class="gallery-overlay"><span><span aria-hidden="true">〈/〉</span> JOGO DO PÁSSARO</span></div></div>
            <div class="gallery-item hover-target gs-up"><img src="/assets/images/insta-4.jpg" alt="Registro de desenvolvimento de Space Shooter — imagem 4" loading="lazy" decoding="async" width="509" height="838"><div class="gallery-overlay"><span><span aria-hidden="true">〈/〉</span> SPACE SHOOTER</span></div></div>
        </div>
    </section>

<?php endif; ?>
<?php endif; ?>
</main>
<?php render('components/footer', []); ?>

</body>
</html>
