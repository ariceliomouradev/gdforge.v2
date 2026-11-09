<?php declare(strict_types=1); ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= escape($title) ?></title>
<meta name="description" content="<?= escape($description) ?>">
<meta name="robots" content="<?= $found && !($preview ?? false) ? 'index, follow, max-image-preview:large' : 'noindex, follow' ?>">
<?php if ($found && !($preview ?? false)): ?><link rel="canonical" href="https://gdforge.com.br<?= escape($canonicalPath) ?>"><?php endif; ?>
<meta property="og:type" content="<?= $article !== null ? 'article' : 'website' ?>">
<meta property="og:locale" content="pt_BR">
<meta property="og:site_name" content="GDForge">
<meta property="og:title" content="<?= escape($title) ?>">
<meta property="og:description" content="<?= escape($description) ?>">
<?php if ($found && !($preview ?? false)): ?><meta property="og:url" content="https://gdforge.com.br<?= escape($canonicalPath) ?>"><?php endif; ?>
<?php if ($article !== null && isset($article['image'])): ?><meta property="og:image" content="https://gdforge.com.br<?= escape($article['image']) ?>"><meta property="og:image:alt" content="<?= escape($article['image_alt']) ?>"><?php endif; ?>
<meta name="twitter:card" content="summary">
<link rel="icon" href="/assets/images/gd-forge-logo-1.png" type="image/png">
<link rel="stylesheet" href="/assets/site.css">
<script src="/assets/site.js" defer></script>
</head>
