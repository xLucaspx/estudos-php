<?php

$notas = [
	'Maria' => 10,
	'Vinicius' => 6,
	'Ana' => 10,
	'Roberto' => 7,
	'João' => 8,
];

// existe uma função que retorna a chave para determinado valor em um array:
echo "Quem tirou 10?" . PHP_EOL;
var_dump(array_search(10, $notas)); // vai retornar a primeira chave para o valor correspondente
// também possui parâmetro boolean para ativar a comparação com strict (padrão: false)
var_dump(array_search('10', $notas, true)); // se não houver correspondência, retornará false
