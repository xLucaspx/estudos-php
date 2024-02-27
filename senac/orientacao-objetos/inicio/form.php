<?php

use src\Model\Calculadora;
use src\Model\Pessoa;

require_once 'src/Model/Pessoa.php';
require_once 'src/Model/Calculadora.php';

$nome = filter_input(INPUT_POST, 'nome');
$idade = filter_input(INPUT_POST, 'idade');
$valorX = filter_input(INPUT_POST, 'valor-1');
$valorY = filter_input(INPUT_POST, 'valor-2');
$operacao = filter_input(INPUT_POST, 'operacao');

$pessoa = new Pessoa(htmlspecialchars($nome), htmlspecialchars($idade));

$valorX = round($valorX, 2);
$valorY = round($valorY, 2);

$calculadora = new Calculadora();

$resultado = match ($operacao) {
	'adicao' => ['sinal' => '+', 'resultado' => $calculadora->adicao($valorX, $valorY)],
	'subtracao' => ['sinal' => '-', 'resultado' => $calculadora->subtracao($valorX, $valorY)],
	'multiplicacao' => ['sinal' => '*', 'resultado' => $calculadora->multiplicacao($valorX, $valorY)],
	'divisao' => ['sinal' => '/', 'resultado' => $calculadora->divisao($valorX, $valorY)],
	'modulo' => ['sinal' => '%', 'resultado' => $calculadora->modulo($valorX, $valorY)],
	'potencia' => ['sinal' => '^', 'resultado' => $calculadora->potenciacao($valorX, $valorY)]
};
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Resultados</title>
</head>
<body>
<p><?= $pessoa; ?></p>
<hr>
<p><?= ucfirst($operacao) . ':' ?></p>
<p><?= "$valorX {$resultado['sinal']} $valorY = {$resultado['resultado']}" ?></p>
</body>
</html>
