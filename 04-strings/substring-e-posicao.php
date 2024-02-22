<?php

$email = "fulano@email.com";

// podemos utilizar substr para pegar uma substring
$usuario = substr($email, 0, 6);
$dominio = substr($email, 7); // se não informamos o comprimento vai até o final da string

echo "Usuário: $usuario" . PHP_EOL;
echo "Domínio: $dominio" . PHP_EOL;

// para casos dinâmicos temos que calcular as posições:
$emails = ["joao.silva01@outlook.com", "maria-dias@gmail.com", "pafuncio@php.dev"];

foreach ($emails as $email) {
	// para buscar a posição de uma substring utilizamos strpos
	$split = strpos($email, "@"); // retorna a posição ou false, se não encontrar a substring

	$usuario = substr($email, 0, $split);
	$dominio = substr($email, $split + 1);

	echo "\nUsuário: $usuario" . PHP_EOL;
	echo "Domínio: $dominio" . PHP_EOL;
}
