<?php
require_once __DIR__ . '/T1.php';

$pdo->exec('INSERT INTO NOTAS (texto) VALUES ("ola")');
$result = $pdo->query('SELECT texto FROM notas');

foreach ($result as $row) {
  echo $row['texto'] . PHP_EOL;
}