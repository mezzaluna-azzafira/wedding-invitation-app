<?php

// Konfigurasi log channel ke stderr untuk Vercel
putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';
$_SERVER['LOG_CHANNEL'] = 'stderr';

// Panggil aplikasi Laravel
require __DIR__ . '/../public/index.php';