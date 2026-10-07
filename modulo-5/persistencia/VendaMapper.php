<?php
class VendaMapper {
  private static ?PDO $conn = null;

  public static function setConnection(PDO $conn): void {
    self::$conn = $conn;
  }

  public static function save(Venda $venda): bool {
    $sql = 'INSERT INTO vendas DEFAULT VALUES';
    $stmt = self::$conn->prepare($sql);
    $stmt->execute();
    $vendaId = (int) self::$conn->lastInsertId();
    $venda->setId($vendaId);

    $sqlItem = 'INSERT INTO venda_itens (venda_id, produto_id, quantidade) VALUES (?, ?, ?)';
    $stItem = self::$conn->prepare($sqlItem);
    foreach ($venda->getItens() as $item) {
      $produtoId = $item['produto']->data['id'] ?? 0;
      $stItem->execute([$vendaId, $produtoId, $item['quantidade']]);
    }
    return $vendaId > 0;
  }

  public static function delete(Venda $venda): bool {
    $id = $venda->getId();
    $stItens = self::$conn->prepare('DELETE FROM venda_itens WHERE venda_id = ?');
    $stItens->execute([$id]);
    $stVenda = self::$conn->prepare('DELETE FROM vendas WHERE id = ?');
    $stVenda->execute([$id]);
    return $stVenda->rowCount() > 0;
  }
}
