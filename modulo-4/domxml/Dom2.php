<?php
/**
 * 4.4 Dom2 — montar XML com atributo
 * Rodar: php modulo-4/domxml/Dom2.php
 */

// new DOMDocument().
// Raiz loja. Um item com atributo id="3" (createAttribute, value, appendChild no item).
// Filhos do item: titulo = Caneta, qtd = 2.
// print $dom->saveXML($loja);
// Não usa SimpleXML.

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
