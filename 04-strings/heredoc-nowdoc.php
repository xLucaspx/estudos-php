<?php

function geraEmailAspas($nome): void
{
	// se criarmos uma string com aspas, toda a indentação será mantida, o que às vezes não queremos
	$conteudo = "Olá, $nome,
	
	Estamos entrando em contato para
	{motivo do contato}
	
	{assinatura}";

	echo $conteudo . PHP_EOL;
}

function geraEmailHeredoc(string $nome): void
{
	// ao criar uma string com heredoc, ela remove a indentação do código;
	// é possível indentar o conteúdo dentro da string
	$conteudo = <<<END
	Olá, $nome,
	
	Estamos entrando em contato para
	{motivo do contato}
	
	{assinatura};
	END;

	echo $conteudo . PHP_EOL;
}

geraEmailAspas("Fulano de Tal");
geraEmailHeredoc("Fulano de Tal");

// para inicializar uma string com heredoc, utilizamos o sinal `<<<` seguido de uma palavra que será o delimitador 
// da string; ou seja, todo o conteúdo será string até que chegue no delimitador final; permite interpoação de variáveis
$heredoc = <<<FIM
tudo é string até chegar no FIM;
a indentação no fechamento também é importante
FIM;

// a sintaxe nowdoc equivale às aspas simples, não permitindo interpolação de variáveis
// para declará-la, basta colocar o delimitador entre aspas simples:
$nowdoc = <<<'FIM'
Aqui, não é possível utilizar nenhuma $variável!
Como se fosse uma string criada com 'aspas simples'
O identificador no final não precisa de aspas!
FIM;
