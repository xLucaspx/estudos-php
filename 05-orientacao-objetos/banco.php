<?php

require_once("src/Conta.php");
require_once("src/Titular.php");

function exibeConta(Conta $conta)
{
	$titular = $conta->titular;
	echo sprintf("Titular: $titular->nome, CPF: $titular->cpf, Saldo R$ %.2f", $conta->saldo()) . PHP_EOL;
}

$titular1 = new Titular('01234567809', 'Fábio Dias');
$titular2 = new Titular('01298765444', 'Joana dos Santos');

$conta1 = new Conta($titular1);
$conta2 = new Conta($titular2);

$conta1->deposita(500);
$conta1->transfere(1, $conta2);

exibeConta($conta1);
exibeConta($conta2);

echo "Total de contas: " . Conta::totalDeContas() . PHP_EOL;

var_dump($conta1);
