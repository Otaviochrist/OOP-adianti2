<?php
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