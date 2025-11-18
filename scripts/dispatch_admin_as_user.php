<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Prepare a request and set the user resolver to user id 1 (admin created by seeder)
$request = Illuminate\Http\Request::create('/admin/calendar', 'GET', [], [], [], ['HTTP_HOST' => '127.0.0.1']);
// Force the auth guard to consider user id=1 as authenticated for this request
// Bootstrap the kernel to initialize database and auth services before querying the user
$kernel->bootstrap();
$user = \App\Models\User::find(1);
if ($user) {
    // Ensure the container returns the current request when the auth manager asks for it
    $app->instance('request', $request);
    $app->instance(Illuminate\Http\Request::class, $request);
    $auth = $app->make('auth');
    $guard = $auth->guard();
    if (method_exists($guard, 'setRequest')) {
        $guard->setRequest($request);
    }
    $guard->setUser($user);
    $request->setUserResolver(function () use ($user) { return $user; });
}

try {
    $response = $kernel->handle($request);
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
