<?php
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