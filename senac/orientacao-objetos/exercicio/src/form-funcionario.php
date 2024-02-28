<?php

use Senac\OO\Model\Funcionario;

require_once 'autoloader.php';

$cpf = filter_input(INPUT_POST, 'cpf');
$nome = filter_input(INPUT_POST, 'nome');
$idade = filter_input(INPUT_POST, 'idade');
$cargo = filter_input(INPUT_POST, 'cargo');
$salario = filter_input(INPUT_POST, 'salario');

$funcionario = new Funcionario($cpf, $nome, $idade, $cargo, $salario);
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Funcionário</title>

	<link rel="stylesheet" href="../style.css">
</head>
<body>
<h1 class="title-h1">Funcionário</h1>

<dl class="d-list">
	<dt class="dl-term">CPF</dt>
	<dd class="dl-definition"><?= htmlspecialchars($funcionario->getCpfFormatado()); ?></dd>

	<dt class="dl-term">Nome</dt>
	<dd class="dl-definition"><?= htmlspecialchars($funcionario->getNome()); ?></dd>

	<dt class="dl-term">Idade</dt>
	<dd class="dl-definition"><?= htmlspecialchars("{$funcionario->getIdade()} anos"); ?></dd>

	<dt class="dl-term">Cargo</dt>
	<dd class="dl-definition"><?= htmlspecialchars($funcionario->getCargo()); ?></dd>

	<dt class="dl-term">Salário</dt>
	<dd class="dl-definition"><?= htmlspecialchars(sprintf("R$ %.2f", $funcionario->getSalario())); ?></dd>
</dl>

<div class="center-div">
	<a href="../index.html" class="a btn">Menu Principal</a>
</div>
</body>
</html>
