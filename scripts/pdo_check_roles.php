<?php
$dbFile = __DIR__ . '/../database/database.sqlite';
if (!file_exists($dbFile)) { echo "No DB file at $dbFile\n"; exit(1);} 
$pdo = new PDO('sqlite:' . $dbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Users:\n";
foreach ($pdo->query('SELECT id, email, is_admin FROM users') as $row) {
    echo "- {$row['id']} {$row['email']} is_admin={$row['is_admin']}\n";
}

echo "\nRoles:\n";
foreach ($pdo->query('SELECT id, name FROM roles') as $row) {
    echo "- {$row['id']} {$row['name']}\n";
}

echo "\nModel Has Roles:\n";
foreach ($pdo->query('SELECT * FROM model_has_roles') as $row) {
    echo "- role_id={$row['role_id']} model_type={$row['model_type']} model_id={$row['model_id']}\n";
}
