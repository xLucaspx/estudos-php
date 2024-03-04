<?php

function funcao1(): void
{
	echo "entrando na função 1 " . PHP_EOL;

	// Forçando Exception:
	// $fixedArr = new SplFixedArray(2);
	// $fixedArr[3] = 'Elemento'; // Uncaught RuntimeException: Index invalid or out of range

	// Forçando Error:
	// $div = intdiv(5, 0); // Uncaught DivisionByZeroError: Division by zero

	funcao2();
	echo "saindo da função 1 " . PHP_EOL;
}

function funcao2(): void
{
	echo "entrando na função 2 " . PHP_EOL;
	for ($i = 1; $i <= 5; $i++) echo "$i... ";

	// utilizando var_dump ou print_r em debug_backtrace podemos obter informações sobre a execução do programa:
	// var_dump(debug_backtrace());
	// print_r(debug_backtrace());

	echo "\nsaindo da função 2 " . PHP_EOL;
}

echo "iniciando programa" . PHP_EOL;
funcao1();
echo "finalizando programa" . PHP_EOL;

// Os objetos vivem em outro espaço da memória (chamado de HEAP). Na pilha (Stack) vivem apenas as
// variáveis e as referências locais de cada função/método.
