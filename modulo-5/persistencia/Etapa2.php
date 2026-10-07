<?php
// Etapa 2 — depois da Etapa 1 + Categoria
// php modulo-5/persistencia/Etapa2.php
//
// require Conexao, Categoria
// Categoria::setConnection(Conexao::abrir());
//
// 1. new Categoria, nome = 'Livros', save()
// 2. find(id) → echo nome
// 3. all() → echo cada nome
// 4. delete() no objeto

require_once __DIR__ . '/Conexao.php';
require_once __DIR__ . '/Categoria.php';

$pdo = conexao::abrir();
Categoria::setConnection($pdo);

$c = new Categoria();
$c->nome = 'Livros';
$c->save();

$achou = Categoria::find($c->id);
echo $achou->nome . PHP_EOL;

foreach (Categoria::all() as $cat) {
  echo $cat->nome . PHP_EOL;
}

$c->delete();

