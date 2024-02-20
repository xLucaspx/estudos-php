<?php

// o spread operator (...) pode ser utilizado, por exemplo, em funções
// para receber qualquer número de um parâmetro:
function soma(int ...$num): int
{
	// dentro da função, o parâmetro com spread se torna um array
	$soma = 0;
	foreach ($num as $x) $soma += $x;
	return $soma;
}

echo soma(1, 2, 3, 4, 5, 6, 7, 8, 9) . PHP_EOL;

function subtrai(int $a, int $b, int $c)
{
	return $a - $b - $c;
}
// ou para passar um array como elementos individuais
echo subtrai(...[3, 2, 1]) . PHP_EOL;

// quando utilizamos o spread para desempacotar arrays, ele pode ser chamado de 'unpacking operator'
