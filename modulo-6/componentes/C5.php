<?php

require_once 'Element.php';

$html = new Element('html');
$body = new Element('body');
$btn = new Element('button');
$btn->add('Salvar');
$body->add($btn);
$html->add($body);
$html->show();
echo "\n";
class Pagina {
  function salvar() {
    echo "salvou\n";
  }
}

$pagina = new Pagina();
$pagina->salvar();