<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
/** @var \Illuminate\Database\DatabaseManager $db */
$db = $app->make(Illuminate\Database\DatabaseManager::class);
$conn = $db->connection();
$schema = $conn->getDoctrineSchemaManager();
$tables = $schema->listTableNames();
print_r($tables);
