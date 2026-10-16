<?php

require_once __DIR__ . '/../persistencia/Conexao.php';
require_once __DIR__ . '/../active-record/Record.php';
require_once __DIR__ . '/../active-record/Produto.php';
require_once __DIR__ . '/Repository.php';

$conn =Conexao::abrir();
$new_repo = new Repository('Produto', $conn);
$lista = $new_repo->load();
foreach ($lista as $produto) {
  echo $produto->id . ' - ' . $produto->descricao . PHP_EOL;
}