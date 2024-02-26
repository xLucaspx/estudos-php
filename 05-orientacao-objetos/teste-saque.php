<?php

use Curso\Banco\Model\Conta\{ContaCorrente, ContaPoupanca, Titular};
use Curso\Banco\Model\Endereco;

require_once 'autoload.php';

$endereco = new Endereco('Av. Felipe Camarão', 'Bom Fim', '736', 'Porto Alegre', 'RS');
$titular = new Titular('12345678909', 'Márcio da Silva', $endereco);

$contaCorrente = new ContaCorrente($titular);
$contaPoupanca = new ContaPoupanca($titular);

$contaCorrente->deposita(5000);
$contaCorrente->transfere(1000, $contaPoupanca);
$contaPoupanca->saca(100);

echo $contaCorrente . PHP_EOL;
echo $contaPoupanca . PHP_EOL;
