<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';

// Manually instantiate controller and call index() to bypass auth middleware for testing
try {
    $controller = new \App\Http\Controllers\Admin\CalendarController();
    $response = $controller->index();

    if (is_string($response)) {
        echo $response;
    } elseif (method_exists($response, 'getContent')) {
        echo $response->getContent();
    } else {
        var_export($response);
    }
} catch (Throwable $e) {
    echo "Exception: " . get_class($e) . " - " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
