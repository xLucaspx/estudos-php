<?php

function formataEndereco(string $cep, string $logradouro, string $bairro, string $numero, string $complemento, string $cidade, string $uf): string
{
	$endereco = "$logradouro, ";

	$endereco . $numero != null ? "$numero" : '';
	$endereco . $complemento != null ? " - $complemento," : ', ';

	$endereco . "$bairro, $cidade - $uf; CEP: $cep";

	return $endereco;
}

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

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
