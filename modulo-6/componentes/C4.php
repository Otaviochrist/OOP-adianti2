<?php
require_once 'Element.php';

$html = new Element('html');
$body = new Element('body');
$dialog = new Element('div');
$dialog->class = 'dialog';
$msg = new Element('p');
$msg->add('Salvo');
$dialog->add($msg);
$body->add($dialog);
$html->add($body);
$html->show();