<?php

$notas = [
	'Vinicius' => '6',
	'Ana' => '10',
	'Roberto' => '7',
	'Maria' => null,
	'João' => '8',
];

// podemos verificar determinada chave existe em um array:
var_dump(array_key_exists('João', $notas)); // true
// também existe o apelido key_exists, mas é menos utilizado:
var_dump(key_exists('Maria', $notas)); // true

// se queremos verificar se uma chave existe E não é nula, utilizamos isset
var_dump(isset($notas['João'])); // true
var_dump(isset($notas['Maria'])); // false

// podemos verificar se existe determinado valor dentro de um array:
echo "Alguém tirou 10?" . PHP_EOL;
var_dump(in_array(10, $notas));
// podemos passar um terceiro parâmetro booleano para utilizar comparação strict (o padrão é false):
echo "Alguém faltou na prova?" . PHP_EOL;
var_dump(in_array(null, $notas, true));
