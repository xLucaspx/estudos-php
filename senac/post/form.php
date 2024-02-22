<?php

function formataEndereco(string $cep, string $logradouro, string $bairro, string $numero, string $complemento, string $cidade, string $uf): string
{
	$endereco = "$logradouro, ";

	$endereco . $numero != null ? "$numero" : '';
	$endereco . $complemento != null ? " - $complemento," : ', ';

	$endereco . "$bairro, $cidade - $uf; CEP: $cep";

	return $endereco;
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$mensagem = $_POST['mensagem'];

$endereco = formataEndereco($cep, $logradouro, $bairro, $numero, $complemento, $cidade, $uf);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensagem enviada</title>
</head>

<body>
	<h1>Mensagem enviada</h1>

	<p>
		<?= "Nome: $nome" ?>
	</p>
	<p>
		<?= "E-mail: $email" ?>
	</p>
	<p>
		<?= "Telefone: $telefone" ?>
	</p>
	<p>
		<?= "Endereço: $endereco" ?>
	</p>
	<p>
		<?= "Mensagem:<br>$mensagem" ?>
	</p>

	<hr>
</body>

</html>
