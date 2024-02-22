<?php

$nomes = ["Lucas Oliveira", "Fulano dos Santos"];

// desde a versão 8.0 existe a função str_contains
$isOliveira = str_contains($nomes[1], "Oliveira");

var_dump($isOliveira);

foreach ($nomes as $nome) {
	if (str_contains($nome, "Oliveira"))
		echo "$nome é um Oliveira" . PHP_EOL;
	else
		echo "$nome não é um Oliveira" . PHP_EOL;
}

// antes do PHP 8 era necessário buscar a posição da string desejada na variável;
// se não existisse retornaria false; caso contrário, retornaria a posição

// para verificar o início e o fim de uma string existem as funções str_starts_with e str_ends_with
$urls = ["https://meusite.com.br", "http://outrosite.com"];

foreach ($urls as $url) {
	// verifica o começo da string
	$isHttps = str_starts_with($url, "https");
	// verifica o final da string
	$isBr = str_ends_with($url, ".br"); // se fosse .br/ retornaria false; este é apenas um exemplo, existem outras soluções

	if ($isHttps)
		echo "$url é um site seguro" . PHP_EOL;
	else
		echo "$url não é um site seguro" . PHP_EOL;

	if ($isBr)
		echo "$url é um domínio do Brasil" . PHP_EOL;
	else
		echo "$url não é um domínio do Brasil" . PHP_EOL;
}
