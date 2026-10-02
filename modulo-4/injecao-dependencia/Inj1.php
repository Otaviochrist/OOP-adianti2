<?php

// 1) Interface Logger com metodo escrever(string $msg): void

// 2) Classe EchoLogger: implementa Logger; echo da msg + PHP_EOL

// 3) Classe Pedido:
//    - propriedade privada Logger $logger
//    - construtor recebe Logger (injecao)
//    - metodo criar(): chama $this->logger->escrever('pedido criado')

// 4) new Pedido(new EchoLogger()) e criar()

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