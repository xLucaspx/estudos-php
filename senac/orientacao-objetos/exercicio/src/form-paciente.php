<?php

use Senac\OO\Model\Paciente;

require_once 'autoloader.php';

$cpf = filter_input(INPUT_POST, 'cpf');
$nome = filter_input(INPUT_POST, 'nome');
$idade = filter_input(INPUT_POST, 'idade');
$sintomas = filter_input(INPUT_POST, 'sintomas');

$paciente = new Paciente($cpf, $nome, $idade, $sintomas);
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Paciente</title>

	<link rel="stylesheet" href="../style.css">
</head>
<body>
<h1 class="title-h1">Paciente</h1>

<dl class="d-list">
	<dt class="dl-term">CPF</dt>
	<dd class="dl-definition"><?= htmlspecialchars($paciente->getCpfFormatado()); ?></dd>

	<dt class="dl-term">Nome</dt>
	<dd class="dl-definition"><?= htmlspecialchars($paciente->getNome()); ?></dd>

	<dt class="dl-term">Idade</dt>
	<dd class="dl-definition"><?= htmlspecialchars("{$paciente->getIdade()} anos"); ?></dd>

	<dt class="dl-term">Sintomas</dt>
	<dd class="dl-definition"><?= htmlspecialchars($paciente->sintomas); ?></dd>
</dl>

<div class="center-div">
	<a href="../index.html" class="a btn">Menu Principal</a>
</div>
</body>
</html>
