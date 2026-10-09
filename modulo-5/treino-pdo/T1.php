<?php
$dsn = 'sqlite:' . __DIR__ . '/treino.sqlite';

$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec('CREATE TABLE IF NOT EXISTS notas (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      texto TEXT
)');

echo 'ok' . PHP_EOL;