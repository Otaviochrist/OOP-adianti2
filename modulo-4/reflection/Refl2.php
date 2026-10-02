<?php

class conta {
  public float $saldo;
  public function depositar(float $valor, float $saldo ): float {
    if ($valor > 0){
      $this->saldo += $valor;
    } else {
      throw new Exception("Valor inválido");
    }
    return $this->saldo;
  }
 }

$r = new ReflectionClass('conta');
echo $r->hasMethod('depositar') ? "sim \n" : "nao \n";
$p = $r->getProperty('saldo');
echo $p->getName();
$m = $r->getMethod('depositar');
$c = new conta();
$c->saldo = 0;
$m->invoke($c, 10, 100);

