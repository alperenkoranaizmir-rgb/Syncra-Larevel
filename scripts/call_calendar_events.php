<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
// Bootstrap the framework so service providers (DB, view, etc.) are registered
try {
    if (class_exists('\Illuminate\Contracts\Console\Kernel')) {
        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
    }
    // Ensure the database service provider is registered for Eloquent
    if (class_exists('\Illuminate\Database\DatabaseServiceProvider')) {
        $app->register(\Illuminate\Database\DatabaseServiceProvider::class);
    }

    $controller = new \App\Http\Controllers\Admin\CalendarController();
    $request = new \Illuminate\Http\Request();
    $response = $controller->events($request);

    if (method_exists($response, 'getContent')) {
        echo $response->getContent();
    } else {
        var_export($response);
    }
} catch (Throwable $e) {
    echo "Exception: " . get_class($e) . " - " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
