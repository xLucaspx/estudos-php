<?php

use Senac\Crud\Controller\AlunoController;
use Senac\Crud\Model\Aluno\Aluno;

require_once '../autoload.php';

$id = filter_input(INPUT_GET, 'id');
$aluno = null;

if ($id) {
	$controller = new AlunoController();
	$dadosAluno = $controller->buscaPorId($id);
	$aluno = new Aluno($dadosAluno);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $aluno ? "Edição de aluno" : "Cadastro de aluno" ?></title>

	<link rel="stylesheet" href="../style/style.css">
</head>
<body>
<h1><?= $aluno ? "Edição de aluno" : "Cadastro de aluno" ?></h1>

<form action="" method="<?= $aluno ? "put" : "post" ?>" class="form">
	<fieldset class="fieldset">
		<legend class="legend">Dados pessoais</legend>

		<label for="nome" class="label">Nome: </label>
		<input type="text" name="nome" id="nome" class="textfield" required value="<?= $aluno ? $aluno->getNome() : "" ?>">

		<label for="cpf" class="label">CPF: </label>
		<input type="text" name="cpf" id="cpf" class="textfield" required
			value="<?= $aluno ? $aluno->getCpf() : "" ?>" <?= $aluno ? 'readonly' : '' ?>>

		<label for="dataNascimento" class="label">Data de nascimento: </label>
		<input type="date" name="dataNascimento" id="dataNascimento" required
			value="<?= $aluno ? $aluno->dataNascimento->format('Y-m-d') : "" ?>" <?= $aluno ? 'readonly' : '' ?>>
	</fieldset>

	<fieldset class="fieldset">
		<legend class="legend">Dados acadêmicos</legend>

		<label for="email" class="label">E-mail: </label>
		<input type="email" name="email" id="email" class="textfield" required
			value="<?= $aluno ? $aluno->getEmail() : "" ?>">

		<label for="matricula" class="label">Matrícula </label>
		<input type="text" name="matricula" id="matricula" class="textfield" required
			value="<?= $aluno ? $aluno->matricula : "" ?>" <?= $aluno ? 'readonly' : '' ?>>
	</fieldset>

	<input type="submit" value="<?= $aluno ? "Atualizar" : "Cadastrar" ?>" class=" btn">
</form>
</body>
</html>
