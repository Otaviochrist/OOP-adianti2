<?php

class Nota {
  public string $texto = '';
  public function getTamanho(): int {
    return strlen($this->texto);
  }
}