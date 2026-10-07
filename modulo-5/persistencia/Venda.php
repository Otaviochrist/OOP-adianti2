<?php
class Venda {
  private ?int $id = null;
  private array $itens = [];

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function getId(): ?int {
    return $this->id;
  }

  public function addItem(float $quantidade, produto $pro): void {
    $this->itens[] = [
      'produto' => $pro,
      'quantidade' => $quantidade,
    ];
  }

  public function getItens(): array {
    return $this->itens;
  }
}
