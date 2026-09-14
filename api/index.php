<?php

// Paksa log driver ke stderr secara instan sebelum Laravel loading
$_ENV['LOG_CHANNEL'] = 'stderr';
putenv('LOG_CHANNEL=stderr');

require __DIR__ . '/../public/index.php';