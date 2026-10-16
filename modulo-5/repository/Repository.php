<?php
// 5.x — Repository (coleção de Active Records)
//
// Record = 1 linha. Repository = várias linhas da mesma tabela.
// Não misturar com persistencia/Produto (Gateway).
//
// class Repository
//   $class  → string, nome da classe (ex.: 'Produto')
//   $conn   → PDO
//
// __construct($class, PDO $conn)
//   guarda os dois
//
// load(): array
//   1. $obj = new $this->class   (só para perguntar a tabela)
//   2. $tabela = $obj->getEntity()
//   3. prepare SELECT * FROM tabela  (sem WHERE nesta aula)
//   4. execute + fetch em loop (PDO::FETCH_ASSOC)
//   5. cada $linha:
//        $item = new $this->class
//        foreach $linha as $col => $val  →  $item->$col = $val
//        coloca $item num array
//   6. return esse array
//
// Dica: $item->$col chama __set do Record (não escreva __set aqui).
// Dica: new $this->class  — o nome da classe está na string.


class repository{
  public $class;
  public $conn;

  public function __construct($class, $conn){
    $this->class = $class;
    $this->conn = $conn;
  }


  public function load(){
    $obj = new $this->class;
    $tabela = $obj->getEntity();
    $stmt = $this->conn->prepare("SELECT * FROM $tabela");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $linha) {
      $item = new $this->class;
      foreach ($linha as $col => $val) {
        $item->$col = $val;
      }
      $lista[] = $item;
    }
    return $lista;
  }
}