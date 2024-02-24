<?php

require_once "autoload.php";

use Curso\Banco\Model\Conta\Conta;
use Curso\Banco\Model\Conta\Titular;
use Curso\Banco\Model\Endereco;
use Curso\Banco\Model\Funcionario;

function exibeConta(Conta $conta): void
{
	$titular = $conta->titular;
	echo sprintf("Titular: {$titular->getNome()}, CPF: {$titular->getCpf()}, Saldo R$ %.2f", $conta->getSaldo()) . PHP_EOL;
}

$endereco = new Endereco('Rua Santo Antônio', 'Bom Fim', '879', 'Porto Alegre', 'RS');

$titular1 = new Titular('12345678909', 'Fábio Dias', $endereco);
$titular2 = new Titular('33455678068', 'Joana dos Santos', $endereco);

$conta1 = new Conta($titular1);
$conta2 = new Conta($titular2);

$conta1->deposita(500);
$conta1->transfere(1, $conta2);

exibeConta($conta1);
exibeConta($conta2);

echo "Total de contas: " . Conta::getTotalDeContas() . PHP_EOL;

$funcionario = new Funcionario('32103995066', 'Anderson Farias', 'Analista');
$funcionario->setaNome("Robson");

var_dump($funcionario);
