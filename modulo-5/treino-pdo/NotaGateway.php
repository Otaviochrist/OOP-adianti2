<?php
class NotaGateway {
  private static ?PDO $conn = null;
  public static function setConnection(PDO $conn): void {
    self::$conn = $conn;
    }
   public static function save(string $texto): bool {
    $stmt = self::$conn->prepare("INSERT INTO notas (texto) VALUES (?)");
    return $stmt->execute([$texto]);
   }
   public static function find(int $id): ?Nota {
    $stmt = self::$conn->prepare("SELECT texto FROM notas WHERE id = ?");
    $stmt->execute([$id]);
    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($linha) {
      return new Nota($linha['texto']);
    }
    return null;
   }
}