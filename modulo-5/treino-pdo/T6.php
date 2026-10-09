<?php
// TREINO 6 — o filme curto
// php modulo-5/treino-pdo/T6.php
//
// require Conexao, Nota, NotaGateway
// setConnection(conexao::abrir())
// save('degrau')
// $id = lastInsertId no PDO... ou devolva o id no save se quiser
//   (simples: $pdo = conexao::abrir(); setConnection($pdo); save; $id = $pdo->lastInsertId())
// find($id) → echo $n->texto
//
// Igual Etapa1, uma tabela só.

require_once __DIR__ . '/Conexao.php';
require_once __DIR__ . '/Nota.php';
require_once __DIR__ . '/NotaGateway.php';
 $pdo = Conexao::abrir();
 NotaGateway::setConnection($pdo);
 NotaGateway::save('degrau');
 $id = $pdo->lastInsertId();
 $nota = NotaGateway::find($id);
 $n = new Nota();
 $n->texto = $nota->getTamanho();
 echo $n->texto;