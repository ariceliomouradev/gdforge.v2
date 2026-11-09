<?php declare(strict_types=1); ?>
<section class="container standalone product-page">
    <div class="product-intro"><p class="badge">Visão de produto</p><h1 class="section-title">GDForge <span class="highlight">Gameplay Studio</span></h1><p class="product-tagline">Menos código. Mais gameplay.</p><p>Uma proposta de ferramentas para apoiar a criação de mecânicas em Godot. Aqui você poderá acompanhar o caminho entre a ideia, os experimentos e a validação.</p><p class="status-note">Os tópicos abaixo descrevem a visão do projeto. Não representam funcionalidades entregues, compatibilidade homologada ou uma versão disponível para download.</p><a class="btn" href="/devlog/categoria/gameplay-studio">Acompanhar o desenvolvimento</a></div>
    <section class="product-section" aria-labelledby="product-proposal"><h2 id="product-proposal" class="section-title">Da ideia à <span class="highlight">mecânica</span></h2><div class="feature-grid">
        <article class="feature-card"><span class="badge">Proposta</span><h3>Smart Recipes</h3><p>Organizar soluções reutilizáveis para mecânicas de jogo, com explicações e critérios de uso.</p></article>
        <article class="feature-card"><span class="badge">Proposta</span><h3>Lógica visual</h3><p>Explorar formas mais claras de configurar e compreender o comportamento das mecânicas.</p></article>
        <article class="feature-card"><span class="badge">Objetivo</span><h3>Iteração mais rápida</h3><p>Reduzir trabalho repetitivo para dedicar mais tempo aos testes e à experiência de jogar.</p></article>
    </div></section>
    <section class="product-section" aria-labelledby="recipe-heading"><h2 id="recipe-heading" class="section-title">Explorando <span class="highlight">Smart Recipes</span></h2><p class="section-lead">Alguns conceitos do catálogo de referência. A implementação de cada receita precisa de validação no projeto do produto antes de ser anunciada aqui.</p><div class="recipe-grid">
        <?php foreach ($productInfo['recipes'] as $name => $recipe): ?>
            <?php
            $summary = is_array($recipe) ? ($recipe['summary'] ?? '') : $recipe;
            $link = is_array($recipe) ? ($recipe['link'] ?? null) : null;
            ?>
            <article class="feature-card">
                <h3><?= escape($name) ?></h3>
                <p><?= escape($summary) ?><?php if ($link !== null): ?> <a href="<?= escape($link['url']) ?>" class="recipe-link"><?= escape($link['text']) ?> &rarr;</a><?php endif; ?></p>
                <span class="badge">Conceito de referência</span>
            </article>
        <?php endforeach; ?>
    </div></section>
    <section class="product-section" aria-labelledby="roadmap-heading"><h2 id="roadmap-heading" class="section-title">Caminho da <span class="highlight">forja</span></h2><p class="section-lead">Sequência proposta, sem datas de lançamento ou indicação de etapas concluídas.</p><ol class="roadmap"><?php foreach ($productInfo['milestones'] as $milestone): ?><li><span><?= escape($milestone) ?></span><span class="post-meta">Etapa proposta</span></li><?php endforeach; ?></ol></section>
    <section class="product-section faq" aria-labelledby="faq-heading"><h2 id="faq-heading" class="section-title">Antes de <span class="highlight">começar</span></h2>
        <details><summary>O que é o Gameplay Studio?</summary><p>É a proposta de uma linha de ferramentas da GDForge voltada à criação de gameplay. As funcionalidades só serão apresentadas como disponíveis após validação.</p></details>
        <details><summary>Já posso baixar ou testar?</summary><p>Esta página ainda não oferece download ou inscrição para beta. Quando houver uma versão validada e autorizada, as instruções serão publicadas.</p></details>
        <details><summary>Qual versão do Godot será compatível?</summary><p>O foco é o ecossistema Godot. A versão exata homologada será informada com os resultados dos testes do produto.</p></details>
        <details><summary>Qual será o preço e a licença?</summary><p>Preço e licença ainda não foram confirmados para divulgação.</p></details>
        <details><summary>Existe data de lançamento?</summary><p>Não há uma data confirmada. Acompanhe o Devlog para conhecer as atualizações publicadas.</p></details>
    </section>
    <div class="product-follow"><h2>Acompanhe a próxima etapa</h2><p>Os registros do Gameplay Studio terão seu espaço no Devlog da forja.</p><a class="btn" href="/devlog/categoria/gameplay-studio">Explorar o Devlog</a></div>
</section>
