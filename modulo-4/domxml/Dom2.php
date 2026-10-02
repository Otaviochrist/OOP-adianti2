<?php
$doc = new DOMDocument();
$loja = $doc->createElement('loja');
$doc->appendChild($loja);

$item = $doc->createElement('item');
$item->setAttribute('id', '3');
$loja->appendChild($item);

$titulo = $doc->createElement('titulo');
$titulo->appendChild($doc->createTextNode('Caneta'));
$item->appendChild($titulo);

$qtd = $doc->createElement('qtd');
$qtd->appendChild($doc->createTextNode('2'));
$item->appendChild($qtd);

echo $doc->saveXML($loja);
