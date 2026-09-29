<?php


// --- Exercício 1 (com dica) ---
// Função dividir($a, $b). Se $b for 0, throw Exception. Senão return $a / $b.
// Dica: throw new Exception('...');   try { } catch (Exception $e) { echo $e->getMessage(); }
// Teste: dividir(10, 2) e depois dividir(10, 0).

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
// --- Exercício 2 (sem dica) ---
// Função idadeValida($idade). Idade < 0 ou > 150: lança Exception. Senão devolve a idade.
// Teste: um valor ok e um inválido, com try/catch.
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


