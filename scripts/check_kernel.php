<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
echo get_class($kernel) . PHP_EOL;
echo json_encode($kernel->getMiddlewareAliases(), JSON_PRETTY_PRINT) . PHP_EOL;
