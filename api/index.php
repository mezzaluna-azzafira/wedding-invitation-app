<?php

// Set variabel environment langsung ke 'stderr'
putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';
$_SERVER['LOG_CHANNEL'] = 'stderr';

require __DIR__ . '/../public/index.php';