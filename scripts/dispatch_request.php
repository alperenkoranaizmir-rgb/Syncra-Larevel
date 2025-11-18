<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Create an internal request to the admin calendar route
$request = Illuminate\Http\Request::create('/admin/calendar', 'GET', [], [], [], ['HTTP_HOST' => '127.0.0.1']);

try {
    $response = $kernel->handle($request);
    // Output status and a short body preview
    echo "HTTP/" . $response->getProtocolVersion() . " " . $response->getStatusCode() . "\n";
    foreach ($response->headers->all() as $key => $values) {
        foreach ($values as $v) {
            echo "$key: $v\n";
        }
    }
    echo "\n--- BODY PREVIEW (first 1000 chars) ---\n";
    $content = (string) $response->getContent();
    echo mb_substr($content, 0, 1000) . "\n";
    $kernel->terminate($request, $response);
} catch (Throwable $e) {
    echo "Exception: " . get_class($e) . " - " . $e->getMessage() . "\n\n";
    echo $e->getTraceAsString();
}
