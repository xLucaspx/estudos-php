<?php

require_once "autoload.php";

use Curso\Banco\Model\Conta\{Conta, ContaCorrente, ContaPoupanca, Titular};
use Curso\Banco\Model\Endereco;

$endereco = new Endereco('Rua Santo Antônio', 'Bom Fim', '879', 'Porto Alegre', 'RS');

$titular1 = new Titular('12345678909', 'Fábio Dias', $endereco);
$titular2 = new Titular('33455678068', 'Joana dos Santos', $endereco);

$conta1 = new ContaCorrente($titular1);
$conta2 = new ContaPoupanca($titular2);

$conta1->deposita(500);
$conta1->transfere(1, $conta2);

echo $conta1 . PHP_EOL;
echo $conta2 . PHP_EOL;

echo "Total de contas: " . Conta::getTotalDeContas() . PHP_EOL;

echo $endereco . PHP_EOL;

// Utilizando __set e __get (gambiarra???)
$endereco->logradouro = "Avenida Venâncio Aires";
$endereco->bairro = "Cidade Baixa";
$endereco->numero = "223B";

echo "$endereco->logradouro, Nº $endereco->numero, bairro $endereco->bairro, $endereco->cidade - $endereco->uf" . PHP_EOL;
