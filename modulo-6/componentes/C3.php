<?php

require_once 'Element.php';

$html = new Element('html');
$body = new Element('body');
$box = new Element('div');
$box->style = 'display:flex';
$a = new Element('div');
$a->add('A');
$b = new Element('div');
$b->add('B');
$box->add($a);
$box->add($b);
$body->add($box);
$html->add($body);
$html->show();