<?php


trait A{
  public function salvar(){
    echo "salvou A";
  }
}

trait B{
  public function salvar(){
    echo "salvou B";
  }
}

class documento{
  use A, B{
  A::salvar insteadof B;
  B::salvar as salvarB;
  }
}

 $d = new documento();
 $d->salvar();
 echo PHP_EOL;
 $d->salvarB();

