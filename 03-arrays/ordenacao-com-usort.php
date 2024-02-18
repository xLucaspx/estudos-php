<?php

$notas = [
	[
		'aluno' => 'Juca',
		'nota' => 6.8,
	],
	[
		'aluno' => 'Pafúncio',
		'nota' => 9.5,
	],
	[
		'aluno' => 'Gilda',
		'nota' => 9.5,
	],
	[
		'aluno' => 'Marisa',
		'nota' => 8.9,
	]
];

// ao executar um sort em algo que o PHP não sabe odenar, como um array de arrays,
// o comportamento é inesperado pois não sabemos como o PHP irá comparar os valores
sort($notas);
var_dump($notas);
/* Segundo a documentação:
Array com menos membros é menor, se a chave do operando 1 não é encontrada no operando 2, então os arrays são incomparáveis,
caso contrário - compara valor por valor.
Neste caso, como os arrays possuem o mesmo número de elementos, ordenou pela primeira chave (aluno, em ordem alfabética) */

// podemos utilizar a função usort (de user sort) para dizer ao PHP como queremos ordenar um array;
// para isso, precisamos escrever uma função que será o callback passado para usort:
function ordenaArrayNotas(array $arr1, array $arr2): int
{
	['aluno' => $aluno1, 'nota' => $nota1] = $arr1;
	['aluno' => $aluno2, 'nota' => $nota2] = $arr2;

	// ordenado da maior para a menor nota; o PHP tem um operador chamado spaceship para fazer comparações:
	$resNota = $nota2 <=> $nota1;
	// creio que equivale a:
	// $resNota = round($nota2 - $nota1);

	if ($resNota !== 0) return $resNota;

	// caso sejam iguais, ordena por ordem alfabética
	return $aluno1 <=> $aluno2;
	// return strcmp($aluno1, $aluno2);
}

// para passar uma função como callback, passa-se uma string com o nome da função (por que, PHP?)
usort($notas, 'ordenaArrayNotas');
var_dump($notas);

// se quisermos ordenar pelas chaves do array, utilizamos uksort (u de user, k de key).
