<?php

// 1. Panggil autoloader dari Composer (Ini yang tadi hilang!)
require __DIR__ . '/../vendor/autoload.php';

// 2. Jalankan aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);