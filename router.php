<?php
declare(strict_types=1);

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$public = realpath(__DIR__ . '/public');
$file = is_string($path) ? realpath(__DIR__ . '/public' . $path) : false;

// If the requested resource is an existing file inside public/:
if (is_string($file) && is_string($public) && str_starts_with($file, $public . DIRECTORY_SEPARATOR) && is_file($file)) {
    // If the CLI server was started with `-t public`, let the server handle it natively.
    if (realpath($_SERVER['DOCUMENT_ROOT'] ?? '') === $public) {
        return false;
    }

    // If started without `-t public` (e.g. `php -S localhost:8080 router.php`), serve the file directly.
    $mimes = [
        'css'   => 'text/css; charset=UTF-8',
        'js'    => 'application/javascript; charset=UTF-8',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'webp'  => 'image/webp',
        'avif'  => 'image/avif',
        'ico'   => 'image/x-icon',
        'ttf'   => 'font/ttf',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'xml'   => 'application/xml; charset=UTF-8',
        'txt'   => 'text/plain; charset=UTF-8',
        'json'  => 'application/json; charset=UTF-8',
    ];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $mime = $mimes[$ext] ?? (function_exists('mime_content_type') ? mime_content_type($file) : 'application/octet-stream');
    header('Content-Type: ' . $mime);
    header('Content-Length: ' . (string) filesize($file));
    readfile($file);
    exit;
}

// Normalize trailing slashes (except root) to prevent 404
if (is_string($path) && strlen($path) > 1 && str_ends_with($path, '/')) {
    $cleanPath = rtrim($path, '/');
    $query = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? '?' . $_SERVER['QUERY_STRING'] : '';
    header('Location: ' . $cleanPath . $query, true, 301);
    exit;
}

require __DIR__ . '/public/index.php';

