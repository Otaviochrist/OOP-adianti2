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

 $r = new ReflectionClass('Conta');
 echo $r->getName() . PHP_EOL;
 foreach ($r->getMethods() as $m) {
   echo $m->getName() . PHP_EOL;
 }
 foreach ($r->getProperties() as $p) {
   echo $p->getName() . PHP_EOL;
 }
 try {
 $conta = new conta();
   $conta->saldo = 100;
   $conta->depositar(-100, $conta->saldo);
   echo $conta->saldo . PHP_EOL;
 } catch (Exception $e) {
   echo $e->getMessage() . PHP_EOL;
 }