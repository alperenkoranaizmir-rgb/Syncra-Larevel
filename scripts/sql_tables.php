<?php
$dbFile = __DIR__ . '/../database/database.sqlite';
if (!file_exists($dbFile)) { echo "No DB file at $dbFile\n"; exit(1);} 
$pdo = new PDO('sqlite:' . $dbFile);
$stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
foreach ($tables as $t) { echo $t . PHP_EOL; }
