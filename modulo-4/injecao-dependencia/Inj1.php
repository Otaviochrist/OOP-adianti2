<?php


interface Logger {
  public function escrever(string $msg): void;
}

class echologger implements Logger {
  public function escrever(string $msg): void{
    echo $msg . PHP_EOL;
  }
}

class pedido{
  public function __construct(private Logger $logger){
  }
  public function criar(){
    $this->logger->escrever('pedido criado');
  }
}

$pedido = new pedido(new echologger());
$pedido->criar();