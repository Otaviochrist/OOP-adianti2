<?php
class ficha{
  private array $dados = [];
  public function __set($nome, $valor){
    if ($nome === '') {
      throw new Exception('chave vazia');
  }
  $this->dados[$nome] = $valor;
  }
  public function __get($nome){
      if (!isset($this->dados[$nome])) {
        throw new Exception('chave inexistente');
      }
      return $this->dados[$nome];
  }
  public function __isset($nome){
    return isset($this->dados[$nome]);
  }
}

try {
  $ficha = new ficha();
  $ficha->nome = 'Joao';
  echo $ficha->nome;
  echo "\n";
  var_dump(isset($ficha->idade));
  echo "\n";
  echo $ficha->idade;
} catch(Exception $e) {
  echo $e->getMessage();
}