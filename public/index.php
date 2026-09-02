<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// --------------------------------------------------------------------------
// Fix folder storage & cache khusus Vercel (mencegah Error 500 Read-Only)
// --------------------------------------------------------------------------
$tmpDir = '/tmp';
$storageDirs = [
    $tmpDir . '/storage/framework/views',
    $tmpDir . '/storage/framework/sessions',
    $tmpDir . '/storage/framework/cache/data',
    $tmpDir . '/storage/logs',
    $tmpDir . '/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!file_exists($dir)) {
        @mkdir($dir, 0755, true);
    }
}

putenv("APP_STORAGE={$tmpDir}/storage");
putenv("VIEW_COMPILED_PATH={$tmpDir}/storage/framework/views");
putenv("APP_SERVICES_CACHE={$tmpDir}/bootstrap/cache/services.php");
putenv("APP_PACKAGES_CACHE={$tmpDir}/bootstrap/cache/packages.php");
putenv("APP_CONFIG_CACHE={$tmpDir}/bootstrap/cache/config.php");
putenv("APP_ROUTES_CACHE={$tmpDir}/bootstrap/cache/routes.php");
// --------------------------------------------------------------------------

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());