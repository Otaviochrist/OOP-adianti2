<?php


$xml = '<lista><item>a</item><item>b</item></lista>';
$s = simplexml_load_string($xml);

foreach ($s->item as $i){
  echo $i;
  echo "\n";
}

$s->item[0] = 'x';

foreach ($s->item as $i){
  echo $i;
  echo "\n";
}
