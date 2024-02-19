<?php

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

// a função array_merge cria um array com todos os elementos dos arrays passados, sempre juntando ao final
// essa função não preserva as chaves dos arrays numéricos; como ela adiciona um array ao final do outro, se 
// o primeiro array tiver 5 elementos, o próximo começará a contar da posição [5];
// no caso de arrays associativos e chaves repetidas, as anteriores são substituídas pelas mais recentes
$alunos2024 = array_merge($alunos, $novosAlunos);
var_dump($alunos2024);

// quando trabalhando com arrays podemos utilizar o operador + (union) para adicionar um array ao fim de outro;
// no entanto, este operador não redefine chaves, ou seja, em arrays numéricos, indíces repetidos serão ignorados:
$alunos2024 = $alunos + $novosAlunos;
var_dump($alunos2024); // apenas Juca foi adicionado

// se as chaves forem definidas, o comportamento muda:
$alunos = [
	1 => 'Vinicius',
	2 => 'Ana',
	3 => 'Roberto',
	4 => 'Maria',
	5 => 'João',
];
$novosAlunos = [
	6 => 'Pafúncio',
	7 => 'Cleber',
	8 => 'Rosaura',
	9 => 'Kelly',
];
var_dump($alunos + $novosAlunos);
