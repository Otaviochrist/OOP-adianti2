<?php


function dividir(int $a, int $b) {
  if ($b==0 ) {
    throw new Exception('errou');
  }
  return $resultado = $a/$b;
}

try{

echo dividir(100,2);
echo "\n";
echo dividir(100, 0);
echo "\n";

} catch(Exception $e) {
  echo $e->getMessage();
}

function idadeValida($idade){
    if ($idade < 0 || $idade>150){
      throw new Exception ("Você ta mentindo a idade mano bro");
    }
    return $idade;
}
try{
  echo "\n";
  echo idadeValida(100);
  echo "\n";
  echo idadeValida(-100);
} catch(Exception $e) {
  echo $e->getMessage();
}


