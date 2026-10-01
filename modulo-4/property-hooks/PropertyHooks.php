<?php

 class Nota {
  public int $valor {
    set {
      if ($value < 0 || $value > 10){
        throw new exception('Valor invalido');
      }
      $this->valor = $value;
    }
  }
}

try {
  $n = new Nota;
 $n->valor = 8;
 echo $n->valor;
 echo "\n";
 $n->valor = 11;
 echo $n->valor;
 echo "\n";
} catch (exception $e) {
  echo $e->getMessage();
}