<?php
/**
 * 4.2 Magicos4 — __toString
 * Rodar: php modulo-4/Magicos4.php
 */

// Classe Recado. __construct($texto): texto vazio → throw.
// __toString: return o texto (sem echo dentro).
// Dica: echo $obj chama __toString.   try { echo new Recado('oi'); echo new Recado(''); } catch ...
// Teste: recado ok primeiro, vazio depois.

 class Recado {

  public function __construct(private string $texto) {
    if (empty($texto)) {
      throw new Exception('Texto vazio');
    }
    $this->texto = $texto;
  }
  public function __tostring(){
    return $this->texto;
  }
 }

 try {
  echo new Recado('oi');
  echo "\n";
  echo new Recado('');
 } catch (Exception $e) {
  echo $e->getMessage();
 }