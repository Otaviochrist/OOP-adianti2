<?php
// Etapa 3 — tudo ligado: Gateway + AR + Mapper
// php modulo-5/persistencia/Etapa3.php
//
// require todos
// mesmo PDO nos 3: ProdutoGateway, Categoria, VendaMapper
//
// 1. Categoria save 'Livros'
// 2. Produto via Gateway, categoria_id = id da categoria
// 3. new Venda; addItem(2, $produto); VendaMapper::save($venda)
// 4. echo id da venda
// 5. delete a venda

require_once __DIR__ . '/Conexao.php';
require_once __DIR__ . '/Produto.php';
require_once __DIR__ . '/ProdutoGateway.php';
require_once __DIR__ . '/Categoria.php';
require_once __DIR__ . '/Venda.php';
require_once __DIR__ . '/VendaMapper.php';

$pdo = conexao::abrir();
ProdutoGateway::setConnection($pdo);
Categoria::setConnection($pdo);
VendaMapper::setConnection($pdo);

$cat = new Categoria();
$cat->nome = 'Livros';
$cat->save();

ProdutoGateway::save([
  'descricao' => 'PHP OOP',
  'estoque' => 20,
  'preco_custo' => 40.0,
  'preco_venda' => 70.0,
  'categoria_id' => $cat->id,
]);
$produtoId = ProdutoGateway::getLastId();
$produto = ProdutoGateway::find($produtoId);

$venda = new Venda();
$venda->addItem(2, $produto);
VendaMapper::save($venda);
echo $venda->getId() . PHP_EOL;

VendaMapper::delete($venda);
$cat->delete();
ProdutoGateway::delete($produtoId);

