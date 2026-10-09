<?php

require_once __DIR__ . '/T1.php';


$stmt = $pdo->prepare("INSERT INTO notas (texto) VALUES (?)");
$stmt->execute(['treino']);
$id = $pdo->lastInsertId();

$stmt = $pdo->prepare("SELECT texto FROM notas WHERE id = ?");
$stmt->execute([$id]);
$linha = $stmt->fetch(PDO::FETCH_ASSOC);
echo $linha['texto'];


