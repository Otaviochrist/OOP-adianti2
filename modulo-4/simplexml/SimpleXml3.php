<?php
/**
 * 4.3 SimpleXml3 — os cinco tópicos + hook
 * Rodar: php modulo-4/SimpleXml3.php
 */

// XML: <produtos><produto id="1"><nome>Caderno</nome><preco>10</preco></produto>
//              <produto id="2"><nome>Caneta</nome><preco>4</preco></produto></produtos>
// Ler, listar filhos (foreach), alterar o preco do primeiro para 12,
// ler atributo id de cada produto  [(string) $p['id']].
// Classe PrecoHook: propriedade $v com set que throw se < 0 (property hook).
// Use o hook num preço que você tirou do XML (cast para float). try/catch se quiser testar negativo.

class PrecoHook {
    public float $preco {
        set {
            if ($value < 0) {
                throw new Exception('negativo');
            }
            $this->preco = $value;
        }
    }
}

$xml = '<produtos><produto id="1"><nome>Caderno</nome><preco>10</preco></produto><produto id="2"><nome>Caneta</nome><preco>4</preco></produto></produtos>';
$simpleXml = simplexml_load_string($xml);
foreach ($simpleXml->produto as $p) {
    echo $p->nome . ' - ' . $p->preco . ' - ' . $p['id'] . "\n";
}

try {
    $preco = new PrecoHook;
    $preco->preco = (float) $simpleXml->produto[0]->preco = 12;
    echo $preco->preco . "\n";
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}