<?php

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