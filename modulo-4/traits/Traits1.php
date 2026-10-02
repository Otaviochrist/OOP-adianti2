<?php


trait Logavel {
     public function log(string $msg): void {
        echo"[LOG] {$msg}" . PHP_EOL;
    }
}

class Usuario {
    use Logavel;
}

$u = new Usuario();
$u->log('entrou');

