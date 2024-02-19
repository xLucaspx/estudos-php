<?php

$array1 = [1, 2, 3];
$array2 = [3, 4, 5];
$array3 = [1, 7, 13];

// a função array_diff retorna um novo array contendo todos os elementos do primeiro array
// que não estejam presentes nos próximos; atenção: esta função compara apenas os valores, não as chaves
var_dump(array_diff($array1, $array2, $array3));  // array(1) { [1]=> int(2) }
// Apenas o elemento 2 do $array1 não está presente nos demais arrays e como ele é o segundo elemento, sua chave é 1.

$notasBimestre1 = [
	'Vinicius' => 6,
	'Ana' => 9,
	'Roberto' => 7,
	'Maria' => 10,
	'João' => 8,
];
$notasBimestre2 = [
	'Vinicius' => 6,
	'Ana' => 10,
	'Maria' => 8,
	'João' => 8,
];

// para verificar a diferença entre as chaves, utilizamos array_diff_key:
$diff = array_diff_key($notasBimestre1, $notasBimestre2);
var_dump($diff);

// para levar em consideração tanto as chaves quanto os valores, usa-se array_diff_assoc
$diff = array_diff_assoc($notasBimestre1, $notasBimestre2);
var_dump($diff);

// várias destas funções possuem também uma versão u (user), para passarmos uma função
// personalizada que será utilizada para a comparação de valores

$diff = array_diff_key($notasBimestre1, $notasBimestre2);
// se quisermos obter apenas as chaves, podemos utilizar a função array_keys; essa função também permite
// parâmetros para buscar apenas as chaves que contém determinado valor, strict ou não
$alunosFaltantes = array_keys($diff);
var_dump($alunosFaltantes);

// da mesma forma, podemos pegar apenas os valores com array_values
$notasFaltantes = array_values($diff);
var_dump($notasFaltantes);

// podemos combinar arrays com array_combine, passando um array para chaves e outro para valores
// se os arrays não tiverem o mesmo tamanho, um erro é lançado
$combine = array_combine($alunosFaltantes, $notasFaltantes);
var_dump($combine);

// se quisermos inverter chaves e valores, podemos utilizar array_flip
var_dump(array_flip($combine));
