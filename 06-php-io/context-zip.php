<?php

// tentando abrir um arquivo zipado com senha; sem um contexto com a senha do arquivo, lança warning "Failed to open stream"
$contexto = stream_context_create([
	'zip' => [
		'password' => 'abc123'
	]
]);

$zip = file_get_contents('zip://files/cursos-senha.zip#cursos-write.txt', context: $contexto);
echo $zip;
