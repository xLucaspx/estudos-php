<?php

function funcao1(): void
{
	echo "entrando na função 1 " . PHP_EOL;

	try {
		$fixedArr = new SplFixedArray(2);
		$fixedArr[3] = 'Elemento'; // Uncaught RuntimeException: Index invalid or out of range

		// echo intdiv(5, 0);
	} catch (RuntimeException|DivisionByZeroError $ex) {
		echo "Ocorreu um erro na execução da função 1:" . PHP_EOL;
		echo "{$ex->getMessage()} em {$ex->getFile()}:{$ex->getLine()}" . PHP_EOL;
	}

	// a partir do PHP 8.0 houve a RFC non-capturing catches, que permite o bloco catch sem a necessidade
	// de capturar uma variável da exception ocorrida:
	try {
		funcao2();
	} catch (DivisionByZeroError) {
		echo "\nOutro erro, agora na função 2:\nNão é possível dividir por 0!" . PHP_EOL;
	}

	echo "saindo da função 1 " . PHP_EOL;
}

function funcao2(): void
{
	echo "entrando na função 2 " . PHP_EOL;
	for ($i = 1; $i <= 5; $i++) echo "$i... ";

	echo intdiv($i, 0); // DivisionByZeroError, pego no catch da função 1
	echo "\nsaindo da função 2 " . PHP_EOL;
}

echo "iniciando programa" . PHP_EOL;
funcao1();
echo "finalizando programa" . PHP_EOL;

// Os objetos vivem em outro espaço da memória (chamado de HEAP). Na pilha (Stack) vivem apenas as
// variáveis e as referências locais de cada função/método.
