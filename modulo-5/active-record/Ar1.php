<?php
// 5.4.3 — Manipulando objetos
// php modulo-5/active-record/Ar1.php
//
// require persistencia/Conexao.php + Record.php + Produto.php
// Record::setConnection(conexao::abrir());   // classe conexao (c minúsculo)
//
// 1. new Produto
//    descricao = 'caneta', estoque = 10
//    preco_custo = 1.5, preco_venda = 3, categoria_id = 1
//    store()
// 2. load($id) nesse mesmo objeto (ou new + load)
//    echo descricao
// 3. muda estoque = 20; store() de novo (UPDATE)
// 4. delete()
//
// Tabelas: loja.sqlite (não treino.sqlite)

require_once __DIR__ . '/../persistencia/Conexao.php';
require_once __DIR__ . '/Record.php';
require_once __DIR__ . '/Produto.php';

$conn = Conexao::abrir();
Record::setConnection($conn);

$produto = new Produto();
$produto->descricao = 'caneta';
$produto->estoque = 10;
$produto->preco_custo = 1.5;
$produto->preco_venda = 3;
$produto->categoria_id = 1;
$produto->store();

echo $produto->descricao;

$produto->estoque = 20;
$produto->store();
echo " " . $produto->estoque . PHP_EOL;
$produto->delete();
echo "Produto deletado" . PHP_EOL;