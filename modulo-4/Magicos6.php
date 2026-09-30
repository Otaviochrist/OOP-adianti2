<?php
/**
 * 4.2 Magicos6 — __toString, clone, __clone, clone with, __call
 * Rodar: php modulo-4/Magicos6.php
 */

// Classe Cartao. __construct($nome): nome vazio → throw.
// __toString: return o nome.
// __clone: na copia, marca que é clone (propriedade ou sufixo no nome).
// clone with (PHP 8.5): uma copia com nome novo, tipo clone $c with { nome: 'B' }.
// __call: metodo que não existe → throw com o nome do metodo.
// Teste no try: echo do cartao; clone; clone with; um metodo inventado que caia no catch.

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