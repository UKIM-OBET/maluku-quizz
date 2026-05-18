<?php

/**
 * Vercel Deployment Bootstrap
 * This file is needed for Vercel to properly route requests to Laravel
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__ . '/storage/framework/maintenance.php')) {
    require __DIR__ . '/storage/framework/maintenance.php';
}

if ($uri === '/' || $uri === '') {
    return false;
}

if (file_exists(__DIR__ . $uri)) {
    return false;
}

if (is_dir(__DIR__ . $uri)) {
    return false;
}

require_once __DIR__ . '/index.php';
