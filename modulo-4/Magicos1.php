<?php

class lampada{
  public function __construct(private $ligada){
    if (!is_bool($ligada)) {
      throw new Exception('A lampada nao esta ligada ou desligada');
    }
  }

  public function __destruct()
  {
    echo "A lampada foi desligada";
  }
}

try {
  new lampada(true);
  echo "\n";
  new lampada('x');
} catch(Exception $e) {
  echo $e->getMessage();
}