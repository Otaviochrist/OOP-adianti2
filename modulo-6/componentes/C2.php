<?php

require_once 'Element.php';

$html = new Element('html');
$body = new Element('body');
$panel = new Element('div');
$panel->class = 'panel';
$title = new Element('h1');
$title->add('Painel');
$panel->add($title);
$body->add($panel);
$html->add($body);
$html->show();