<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$q = 'admin';
if (!empty($argv[1])) $q = $argv[1];

$request = Illuminate\Http\Request::create('/admin/roles/search', 'GET', ['q' => $q], [], [], ['HTTP_HOST' => '127.0.0.1']);
$kernel->bootstrap();
$user = \App\Models\User::find(1);
if ($user) {
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
    echo $response->getContent();
    $kernel->terminate($request, $response);
} catch (Throwable $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}
