<?php

require_once __DIR__ . '/Conexao.php';

$pdo = Conexao::abrir();
$stmt = $pdo->prepare("INSERT INTO notas (texto) VALUES (?)");
$stmt->execute(['separado']);

$stmt = $pdo->prepare("SELECT texto FROM notas");
$stmt->execute();
$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($linhas as $linha) {
  echo $linha['texto'] . PHP_EOL;
}