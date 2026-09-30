<?php
/**
 * 4.2 Magicos5 — clone e __clone
 * Rodar: php modulo-4/Magicos5.php
 */

// Classe Pasta. public $titulo.
// __clone: o PHP chama quando faz clone $a. Altera o titulo da COPIA (ex. acrescenta ' (copia)').
// Teste: $a = new Pasta; $a->titulo = 'A'; $b = clone $a; echo dos dois titulos (devem ser diferentes).
// Sem throw obrigatório neste arquivo.

 class Pasta {
  public string $titulo;

  public function __clone() {
    $this->titulo .= ' (copia)';
  }
}

$a = new Pasta;
$a->titulo = 'A';
$b = clone $a;
echo $a->titulo;
echo "\n";
echo $b->titulo;