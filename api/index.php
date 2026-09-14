<?php

// Forward permintaan Vercel ke public/index.php bawaan Laravel
define('LARAVEL_START', microtime(true));

// Mengarahkan folder storage dan cache ke /tmp (karena Vercel read-only)
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);