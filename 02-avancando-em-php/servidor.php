<?php

require "funcoes-e-subrotinas.php";

// podemos subir um servidor do php com o comando `php -S localhost:port`
// podemos utilizar o PHP para devolver HTML que o navegador conseguirá interpretar

foreach ($contas as $cpf => $conta) {
	// ['titular' => $titular, 'saldo' => $saldo] = $conta;
	// echo "CPF: $cpf; Titular: $titular, Saldo R$ $saldo" . '<br>'; // quebra de linha do HTML

	// exibeConta($conta);
}

// podemos, também, informar o interpretador que, a partir de determinado ponto, paramos de escrever código PHP
// a partir deste ponto, o que estiver escrito será interpretado como texto, podendo ser inclusive HTML.
// para sinalizar este ponto, utiliza-se o sinal ?\>
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Banco Servidor Web</title>
</head>

<body>
	<h1>Contas correntes</h1>

	<dl>
		<!-- Criando bloco de código PHP junto com HTML: (QUE BAGUNÇA!!!) -->
		<?php foreach ($contas as $cpf => $conta) { ?>
			<dt>
				<h3>
					<!-- Podemos utilizar a sintaxe echo reduzida <\?= -->
					<?= "{$conta['titular']} - CPF $cpf"; ?>
					<!-- equivale a:
					<\?php echo "{$conta['titular']} - CPF $cpf"; ?> -->
				</h3>
			</dt>
			<dd>
				<?= "Saldo R$ {$conta['saldo']}"; ?>
			</dd>
		<?php } ?>
	</dl>
</body>

</html>
