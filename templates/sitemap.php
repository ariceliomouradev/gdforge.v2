<?php declare(strict_types=1);
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $url => $metadata): ?>
<url><loc><?= escape('https://gdforge.com.br' . $url) ?></loc></url>
<?php endforeach; ?>
</urlset>
