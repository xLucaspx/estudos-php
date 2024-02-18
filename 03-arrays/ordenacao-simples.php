<?php

$notas = [
	10,
	8,
	9,
	7
];

$array = [
	'zero',
	'um',
	'dois',
	'três'
];

// a função sort recebe uma referência para o array, ou seja, irá modificar o array original:
sort($array);

// se passarmos um valor que não é uma variável para o sort, é lançado um erro:
// sort([4, 1, 3, 2]); // Argument #1 ($array) could not be passed by reference

// se quisermos manter a lista original e ter outra ordenada, podemos fazer o seguinte:
$notasOrdenadas = $notas;
sort($notasOrdenadas);

echo "Desordenadas: ";
var_dump($notas);

echo "Ordenadas: ";
var_dump($notasOrdenadas);

// no caso de strings, por padrão o sort ordena por ordem alfabética; no caso de números, do menor para o maior
var_dump($array);
