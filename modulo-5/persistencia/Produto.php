<?php
class produto {
  public array $data = [];

  public function getMargemLucro(): float {
    $custo = $this->data['preco_custo'] ?? 0;
    $venda = $this->data['preco_venda'] ?? 0;
    if ($custo == 0) {
      return 0.0;
    }
    return ($venda - $custo) / $custo;
  }

  public function registraCompra(float $custo, int $quantidade): void {
    $this->data['estoque'] = ($this->data['estoque'] ?? 0) + $quantidade;
    $this->data['preco_custo'] = $custo;
  }
}
