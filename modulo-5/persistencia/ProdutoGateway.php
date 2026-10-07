<?php

// getLastId(): int           lastInsertId (privado na aula; aqui pode ser public p/ testar)
//
// Cada linha vira new Produto com ->data = $row
// NÃO coloque getMargemLucro aqui.

class ProdutoGateway {
  private static ?PDO $conn = null;

  public static function setConnection(PDO $conn): void {
  self::$conn = $conn;
    }
  public static function find (int $id) {
    $sql = 'SELECT * FROM produtos WHERE id = ?';
    $stmt = self::$conn->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
    return null;
    }
    $p = new produto();
    $p->data = $row;
    return $p;
    }
  public static function all(string $filter = ''){
    if($filter === ''){
      $sql = 'SELECT * FROM produtos';
    } else {
      $sql = 'SELECT * FROM produtos WHERE descricao LIKE ?';
    }
    $stmt = self::$conn->prepare($sql);
    if($filter === ''){
      $stmt->execute();
    } else {
      $stmt->execute(['%' . $filter . '%']);
    }
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return array_map(function ($row) {
    $p = new produto();
    $p->data = $row;
      return $p;
    }, $produtos);
  }
  public static function delete(int $id): bool {
    $sql = 'DELETE FROM produtos WHERE id = ?';
    $stmt = self::$conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->rowCount() > 0;
    }

    public static function save(array $data): bool {
      if(isset($data['id'])){
        $sql = 'UPDATE produtos SET descricao = ?, estoque = ?, preco_custo = ?, preco_venda = ?, categoria_id = ? WHERE id = ?';
      } else {
        $sql = 'INSERT INTO produtos (descricao, estoque, preco_custo, preco_venda, categoria_id) VALUES (?, ?, ?, ?, ?)';
      }
      $stmt = self::$conn->prepare($sql);
      if(isset($data['id'])){
        $stmt->execute([$data['descricao'], $data['estoque'], $data['preco_custo'], $data['preco_venda'], $data['categoria_id'], $data['id']]);
      } else {
        $stmt->execute([$data['descricao'], $data['estoque'], $data['preco_custo'], $data['preco_venda'], $data['categoria_id']]);
      }
      return $stmt->rowCount() > 0;
    }
    public static function getLastId(): int {
      return (int) self::$conn->lastInsertId();
    }
  }