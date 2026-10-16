<?php
// php modulo-6/componentes/C1.php
//
// require Element.php
//
// $html = new Element('html')
// $body = new Element('body')
// $div  = new Element('div')
// $div->style = 'background:#eee; padding:10px'
// $div->add('Olá módulo 6')
// $body->add($div)
// $html->add($body)
// $html->show()
//
// Saída esperada: tags html > body > div com o texto dentro.

require_once 'Element.php';


$html = new Element('html');
$body = new Element('body');
$div = new Element('div');
$div->style = 'background:#eee; padding:10px';
$div->add('Olá módulo 6');
$body->add($div);
$html->add($body);
$html->show();
