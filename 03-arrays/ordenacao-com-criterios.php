<?php

$notas = [
	10,
	8,
	9,
	7,
	6
];

// podemos ordenar o array de forma decrescente utilizando rsort (r de reverse):
echo "Notas decrescentes: ";
rsort($notas);
var_dump($notas);
// ao executar o var_dump, pode-se constatar que as chaves do array foram redefinidas para a nova ordem dos elementos;
// se ordenarmos um array associativo da mesma maneira, as chaves serão substituídas pelos valores padrão:
echo "Notas redefinidas: ";
$notas = [
	'Vinicius' => 6,
	'Ana' => 10,
	'Roberto' => 7,
	'Maria' => 9,
	'João' => 8,
];
$notasRedefinidas = $notas;
rsort($notasRedefinidas);
var_dump($notasRedefinidas);

// quando queremos manter as chaves do array como estão, podemos utilizar asort e arsort; o 'a' vem de associative
echo "Notas crescentes com chaves: ";
asort($notas);
var_dump($notas);

echo "Notas decrescentes com chaves: ";
arsort($notas);
var_dump($notas);

// também podemos ordenar um array pelas chaves utilizando ksort e krsort (k de key):
echo "Notas crescentes pelas chaves: ";
ksort($notas);
var_dump($notas);

echo "Notas decrescentes pelas chaves: ";
krsort($notas);
var_dump($notas);
