<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
// Boot the application by making the HTTP kernel
$app->make(Illuminate\Contracts\Http\Kernel::class);
$db = $app->make(Illuminate\Database\DatabaseManager::class);
$users = $db->table('users')->get();
foreach ($users as $u) {
    echo "USER: {$u->id} {$u->email} is_admin={$u->is_admin}\n";
}
$roles = $db->table('roles')->get();
foreach ($roles as $r) {
    echo "ROLE: {$r->id} {$r->name}\n";
}
$roleUser = $db->table('model_has_roles')->get();
foreach ($roleUser as $ru) {
    echo "MODEL_ROLE: model_id={$ru->model_id} role_id={$ru->role_id} model_type={$ru->model_type}\n";
}
