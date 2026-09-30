<?php
/**
 * 4.2 Magicos3 — os cinco juntos
 * Rodar: php modulo-4/Magicos3.php
 */

// Classe Produto.
// __construct($nome): nome vazio → throw.
// preco e estoque só com __set (chaves 'preco' e 'estoque'). Valor < 0 → throw.
// __get: chave que não for preco nem estoque → throw.
// __isset: nas duas chaves.
// __destruct: echo do nome.
// Teste no try: new ok, set/get/isset, e um throw (construtor ou set). Catch imprime a mensagem.

class Produto {
    private array $dados = [];
    public function __construct(private string $nome){
      if ($nome === '') {
        throw new Exception('nome vazio');
    }
  }
     public function __set($nome, $valor){
      if ($nome !== 'preco' && $nome !== 'estoque') {
        throw new Exception('chave invalida');
    }
    if ($valor < 0) {
        throw new Exception('valor negativo');
    }
    $this->dados[$nome] = $valor;
}
      public function __get($nome){
        if ($nome !== 'preco' && $nome !== 'estoque') {
          throw new Exception('chave invalida');
        }
        return $this->dados[$nome];
      }
      public function __isset($nome){
        return isset($this->dados[$nome]);
      }
      public function __destruct(){
        echo "\nProduto: " . $this->nome . " destruido";
      }

}

try {
  $produto = new Produto('Produto 1');
  $produto->preco = 10;
  $produto->estoque = 10;
  echo $produto->preco;
  echo "\n";
  echo $produto->estoque;
  echo "\n";
  var_dump(isset($produto->preco));
  echo "\n";
  $produto->preco = -1;
  echo "\n";
} catch(Exception $e) {
  echo $e->getMessage();

}