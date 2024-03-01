<?php

echo <<<END
Já vimos como fazer requisições HTTP utilizando só o file_get_contents, como abrir arquivos e como manipular arquivos pela rede com o HTTP.

É possível  adicionar contexto, opções extras às streams. O PHP oferece várias opções de contexto e parâmetros que podemos utilizar em qualquer uma
das funções de stream, funções que são chamadas de file system. É possível adicionar informações à leitura (ou escrita) de streams através de contextos.

Os contextos podem ser definidos utilizando a função `stream_context_create` ou as opções podem ser setadas depois utilizando a função `stream_context_set_option`.
END . PHP_EOL;

// stream_context_create recebe um array com a chave sendo para qual método o contexto vai valer e o valor é um array de opções
$contexto = stream_context_create([
	'http' => [
		'method' => 'DELETE',
		// no PHP devemos passar um cabeçalho como 'header' no SINGULAR:
		'header' => 'X-From: PHP' // normalmente cabeçalhos que começam com 'X-' são personalizados e não serão interpretados
	]
]);

echo "\nGET sem contexto:" . PHP_EOL;
$get = file_get_contents('https://httpbin.org/get');
echo $get;

// o parâmetro use_include_path pode padrão é false, e podemos utilizar named arguments para passar o contexto:
echo "\nDELETE com contexto:" . PHP_EOL;
$delete = file_get_contents('https://httpbin.org/delete', context: $contexto);
echo $delete;
// $delete = file_get_contents('https://httpbin.org/delete', false, $contexto);

$contexto = stream_context_create([
	'http' => [
		'method' => 'POST',
		'header' => [ // mais de um cabeçalho também poderia ser separado por \r\n ao invés de ser um array
			'X-From: PHP',
			'Content-Type: text/plain'
		],
		'content' => 'Teste de requisição POST com corpo!'
	]
]);

echo "\nPOST com contexto:" . PHP_EOL;
$post = file_get_contents('https://httpbin.org/post', context: $contexto);
echo $post;

$contexto = stream_context_create([
	'http' => [
		'method' => 'POST',
		'header' => [
			'X-From: PHP',
			'Content-Type: text/plain'
		],
		'content' => 'Teste de requisição POST com corpo!'
	]
]);
