<?php

// Forward request to the public/index.php
// Force storage and bootstrap cache to Vercel /tmp directory
$tmpDir = '/tmp';
putenv("APP_SERVICES_CACHE={$tmpDir}/services.php");
putenv("APP_PACKAGES_CACHE={$tmpDir}/packages.php");
putenv("APP_CONFIG_CACHE={$tmpDir}/config.php");
putenv("APP_ROUTES_CACHE={$tmpDir}/routes.php");

require __DIR__ . '/../public/index.php';