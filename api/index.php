<?php

// 1. Sembunyikan error dari layar pengunjung (Keamanan)
ini_set('display_errors', '0');
error_reporting(E_ALL);

// 2. Alirkan log error langsung ke Dashboard Vercel
putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';
$_SERVER['LOG_SERVER'] = 'stderr';

// 3. Panggil file index Laravel utama
require __DIR__ . '/../public/index.php';