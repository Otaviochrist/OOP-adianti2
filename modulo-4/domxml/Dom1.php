<?php
/**
 * 4.4 Dom1 — montar XML (sem atributo)
 * Rodar: php modulo-4/domxml/Dom1.php
 */

// new DOMDocument().
// Raiz agenda. Um contato dentro.
// No contato: nome = Lia, fone = 1199 (createElement com texto + appendChild).
// print $dom->saveXML($agenda);
// Não usa SimpleXML.
$doc = new DOMDocument();
$agenda = $doc->createElement('agenda');
$doc->appendChild($agenda);

$contato = $doc->createElement('contato');
$agenda->appendChild($contato);

$nome = $doc->createElement('nome');
$nome->appendChild($doc->createTextNode('Lia'));
$contato->appendChild($nome);

$fone = $doc->createElement('fone');
$fone->appendChild($doc->createTextNode('1199'));
$contato->appendChild($fone);

echo $doc->saveXML($agenda);