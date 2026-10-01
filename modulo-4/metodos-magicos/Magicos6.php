<?php
class cartao {
  public function __construct(public string $nome) {
    if (empty($nome)) {
      throw new exception('Nome vazio');
    }
    $this->nome = $nome;
  }
  public function __tostring() {
    return $this->nome;
  }
  public function __clone() {
    $this->nome .= ' (copia)';
  }
  public function __call($nome, $arguments) {
    throw new exception('Metodo nao existe: ' . $nome );
  }
}
try {
  $a = new cartao('A');
  echo "\n";
  echo $a;
  echo "\n";
  $copia = clone $a;
  echo $copia;
  $b = clone($a, [ 'nome' => 'B' ]);
  echo "\n";
  echo $b;
  echo "\n";
  echo $b->naoexiste();
  echo "\n";
} catch (exception $e) {
  echo $e->getMessage();
}