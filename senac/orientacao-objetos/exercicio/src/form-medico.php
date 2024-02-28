<?php

use Senac\OO\Model\Medico;

require_once 'autoloader.php';

$cpf = filter_input(INPUT_POST, 'cpf');
$nome = filter_input(INPUT_POST, 'nome');
$idade = filter_input(INPUT_POST, 'idade');
$crm = filter_input(INPUT_POST, 'crm');
$especialidade = filter_input(INPUT_POST, 'especialidade');

$medico = new Medico($cpf, $nome, $idade, $crm, $especialidade);
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Médico</title>

	<link rel="stylesheet" href="../style.css">
</head>
<body>
<h1 class="title-h1">Médico</h1>

<dl class="d-list">
	<dt class="dl-term">CPF</dt>
	<dd class="dl-definition"><?= htmlspecialchars($medico->getCpfFormatado()); ?></dd>

	<dt class="dl-term">Nome</dt>
	<dd class="dl-definition"><?= htmlspecialchars($medico->getNome()); ?></dd>

	<dt class="dl-term">Idade</dt>
	<dd class="dl-definition"><?= htmlspecialchars("{$medico->getIdade()} anos"); ?></dd>

	<dt class="dl-term">CRM</dt>
	<dd class="dl-definition"><?= htmlspecialchars($medico->crm); ?></dd>

	<dt class="dl-term">Especialidade</dt>
	<dd class="dl-definition"><?= htmlspecialchars($medico->especialidade); ?></dd>
</dl>

<div class="center-div">
	<a href="../index.html" class="a btn">Menu Principal</a>
</div>
</body>
</html>
