<?php
abstract class Record {
  protected static ?PDO $conn = null;
  protected array $data = [];

  public static function setConnection(PDO $conn): void {
    self::$conn = $conn;
  }

  public function __set($prop, $value): void {
    $this->data[$prop] = $value;
  }

  public function __get($prop) {
    return $this->data[$prop] ?? null;
  }

  abstract public function getEntity(): string;


  public function load($id): bool {
  $sql = 'SELECT * FROM ' . $this->getEntity() . ' WHERE id = ?';
  $stmt = self::$conn->prepare($sql);
  $stmt->execute([$id]);
  $linha = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($linha === false) {
    return false;
  }
  $this->data = $linha;
  return true;
  }
  public function store(): bool {
    if ($this->id === null) {
      $dados = $this->data;
      unset($dados['id']);
      $colunas = implode(',', array_keys($dados));
      $interrogacoes = implode(',', array_fill(0, count($dados), '?'));
      $sql = 'INSERT INTO ' . $this->getEntity() . ' (' . $colunas . ') VALUES (' . $interrogacoes . ')';
      $stmt = self::$conn->prepare($sql);
      $stmt->execute(array_values($dados));
      $this->id = self::$conn->lastInsertId();
      return true;
    } else {
      $dados = $this->data;
      unset($dados['id']);
      $set = [];
      foreach (array_keys($dados) as $col) {
        $set[] = $col . ' = ?';
      }
      $set = implode(',', $set);
      $sql = 'UPDATE ' . $this->getEntity() . ' SET ' . $set . ' WHERE id = ?';
      $stmt = self::$conn->prepare($sql);
      $valores = array_values($dados);
      $valores[] = $this->id;
      $stmt->execute($valores);
      return true;
    }
  }
  public function delete(): bool {
       $sql = 'DELETE FROM ' . $this->getEntity() . ' WHERE id = ?';
       $stmt = self::$conn->prepare($sql);
       $stmt->execute([$this->id]);
       return true;
  }
}
