<?php
$xml = '<loja><nome>Livros</nome><dono>Ana</dono></loja>';
$s = simplexml_load_string($xml);
echo $s->nome;
echo "\n";
echo $s->dono;
echo "\n";