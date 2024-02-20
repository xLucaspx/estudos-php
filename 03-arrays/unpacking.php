<?php

// desde a versão 7.4 (numericos)/8.1(strings) podemos "desempacotar" um array com o operador spread (...);
// é , basicamente, como se o PHP removesse os colchetes e utilizasse cada elemento do array individualmente;
// pode ser que, no contexto de arrays, se refiram a este operador como 'unpacking operator' e em outros contextos como 'spread operator'
// é possível, também, desempacotar um array dentro de outro array:

$alunos = [
	'Vinicius',
	'Ana',
	'Roberto',
	'Maria',
	'João',
];
$novosAlunos = [
	'Pafúncio',
	'Cleber',
	'Rosaura',
	'Kelly',
	"Marcos",
	"Juca",
];

$alunos2024 = [...$alunos, ...$novosAlunos];

// utilizando esta sintaxe é possível, por exemplo, adicionar outros elementos entre os arrays, algo que o
// array_merge não consegue fazer pois só recebe arrays como parâmetro

$alunos2024 = [...$alunos, 'Carlos', ...$novosAlunos];

var_dump($alunos2024);

// o spread também pode ser utilizado em outros contextos, como em funções
