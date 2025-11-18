<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Foundation\Application;

// Create the application instance using the classic approach. This is
// simpler and ensures our `App\Http\Kernel` can be bound into the
// container so route middleware aliases (like `admin`) are available.
$app = new Application(dirname(__DIR__));

// Bind the HTTP kernel implementation if it exists in the app.
if (class_exists(\App\Http\Kernel::class)) {
    $app->singleton(Illuminate\Contracts\Http\Kernel::class, \App\Http\Kernel::class);
}

// Conditionally bind console kernel and exception handler if present.
if (class_exists(\App\Console\Kernel::class)) {
    $app->singleton(Illuminate\Contracts\Console\Kernel::class, \App\Console\Kernel::class);
}

if (class_exists(\App\Exceptions\Handler::class)) {
    $app->singleton(Illuminate\Contracts\Debug\ExceptionHandler::class, \App\Exceptions\Handler::class);
}

return $app;
