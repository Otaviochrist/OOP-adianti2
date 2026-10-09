<?php
// TREINO 5 — ligar objeto + banco (você monta)
// php modulo-5/treino-pdo/T5.php
//
// require Conexao + Nota
// $pdo = conexao::abrir();
// $n = new nota(); $n->texto = 'oi';
// echo $n->getTamanho()   (tem que ser 2)
// INSERT $n->texto com ?
//
// SQL fica neste arquivo, NÃO na classe nota.

require_once __DIR__ . '/Conexao.php';
require_once __DIR__ . '/Nota.php';

$pdo = Conexao::abrir();
$n = new Nota();
$n->texto = 'oi';
echo $n->getTamanho() . PHP_EOL;

$stmt = $pdo->prepare('INSERT INTO notas (texto) VALUES (?)');
$stmt->execute([$n->texto]);
