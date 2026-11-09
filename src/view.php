<?php
declare(strict_types=1);

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function render(string $template, array $data): void
{
    extract($data, EXTR_SKIP);
    require dirname(__DIR__) . '/templates/' . $template . '.php';
}
