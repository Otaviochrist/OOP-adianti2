<?php
// 5.2.2 — Active Record (SQL + domínio na MESMA classe)
//
// static $conn : PDO
// setConnection(PDO): void
// propriedades: id, nome
// find(id): static|null
// all(): static[]
// delete(): bool     usa $this->id
// save(): bool       INSERT se id vazio; senão UPDATE
// getLastId() privado
//
// Contraste com Produto: aqui NÃO existe CategoriaGateway.

class Categoria {
  private static ?PDO $conn = null;
  public ?int $id = null;
  public string $nome = '';

  public static function setConnection(PDO $conn): void {
    self::$conn = $conn;
  }

  public static function find(int $id): ?Categoria {
    $sql = 'SELECT * FROM categorias WHERE id = ?';
    $stmt = self::$conn->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
      return null;
    }
    $c = new Categoria();
    $c->id = (int) $row['id'];
    $c->nome = $row['nome'];
    return $c;
  }

  public static function all(): array {
    $sql = 'SELECT * FROM categorias';
    $stmt = self::$conn->prepare($sql);
    $stmt->execute();
    $lista = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
      $c = new Categoria();
      $c->id = (int) $row['id'];
      $c->nome = $row['nome'];
      $lista[] = $c;
    }
    return $lista;
  }

  public function save(): bool {
    if ($this->id === null) {
      $sql = 'INSERT INTO categorias (nome) VALUES (?)';
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([$this->nome]);
      $this->id = self::getLastId();
    } else {
      $sql = 'UPDATE categorias SET nome = ? WHERE id = ?';
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([$this->nome, $this->id]);
    }
    return $stmt->rowCount() > 0;
  }

  public function delete(): bool {
    $sql = 'DELETE FROM categorias WHERE id = ?';
    $stmt = self::$conn->prepare($sql);
    $stmt->execute([$this->id]);
    return $stmt->rowCount() > 0;
  }

  private static function getLastId(): int {
    return (int) self::$conn->lastInsertId();
  }
}