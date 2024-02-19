<?php

$notas = [
	'Vinicius' => 6,
	'Ana' => 10,
	'Roberto' => 7,
	'Maria' => 9,
	'João' => 8,
];

// verificando o tipo com gettype:
echo gettype($notas) . PHP_EOL; // array
if (gettype($notas) === 'array')
	echo "Sim, é um array!" . PHP_EOL;

// a funcao is_array serve para verificar se uma variável é um array
echo is_array($notas) . PHP_EOL;
if (is_array($notas))
	echo "Sim, é um array!" . PHP_EOL;

// para verificar se um array é numérico, ou seja, se suas chaves começam em 0 e são crescentes, fazemos:
var_dump(array_is_list($notas)); // false
sort($notas); // sort também reorganiza as chaves para o padrão
var_dump(array_is_list($notas)); // true
// não importa se definirmos as chaves manualmente, se começarem em 0 e forem crescentes a função retornará true
// se qualquer número for pulado na ordem, por exemplo, será retornado false
$notas = [
	'0' => 6,
	1 => 10,
	'2' => 7,
	3 => 9,
	'4' => 8,
];
var_dump(array_is_list($notas)); // true
// esta função é útil para saber se podemos fazer um for padrão para percorrer um array
