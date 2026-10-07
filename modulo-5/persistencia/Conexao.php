<?php
class conexao {
  static function abrir(){
    $dsn = 'sqlite:'.__DIR__.'/loja.sqlite';
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('CREATE TABLE IF NOT EXISTS categorias (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      nome TEXT
    )');
    $pdo->exec('CREATE TABLE IF NOT EXISTS produtos (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      descricao TEXT,
      estoque INTEGER,
      preco_custo REAL,
      preco_venda REAL,
      categoria_id INTEGER
    )');
    $pdo->exec('CREATE TABLE IF NOT EXISTS vendas (
      id INTEGER PRIMARY KEY AUTOINCREMENT
    )');
    $pdo->exec('CREATE TABLE IF NOT EXISTS venda_itens (
      venda_id INTEGER,
      produto_id INTEGER,
      quantidade REAL
    )');
    return $pdo;
  }
}
