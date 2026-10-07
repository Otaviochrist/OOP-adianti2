<?php
// Etapa 1 — rode quando Conexao + Produto + ProdutoGateway existirem
// php modulo-5/persistencia/Etapa1.php
//
// require Conexao, Produto, ProdutoGateway
// $pdo = Conexao::abrir();
// ProdutoGateway::setConnection($pdo);
//
// 1. save um produto (array: descricao, estoque, preco_custo, preco_venda, categoria_id)
// 2. find pelo id → echo descricao
// 3. registraCompra no objeto → save de novo
// 4. all() → echo cada descricao + margem
// 5. delete esse id

require_once __DIR__ . '/Conexao.php';
require_once __DIR__ . '/Produto.php';
require_once __DIR__ . '/ProdutoGateway.php';

$pdo = conexao::abrir();
ProdutoGateway::setConnection($pdo);

ProdutoGateway::save([
  'descricao' => 'Arroz',
  'estoque' => 10,
  'preco_custo' => 5.0,
  'preco_venda' => 8.0,
  'categoria_id' => 1,
]);
$id = ProdutoGateway::getLastId();

$p = ProdutoGateway::find($id);
echo $p->data['descricao'] . PHP_EOL;

$p->registraCompra(4.5, 5);
$p->data['id'] = $id;
ProdutoGateway::save($p->data);

foreach (ProdutoGateway::all() as $item) {
  echo $item->data['descricao'] . ' ' . $item->getMargemLucro() . PHP_EOL;
}

ProdutoGateway::delete($id);