<?php

// podemos utilizar anotações para avisar a IDE que um método lança exception:
/**
 * @param int $x dividendo
 * @param int $y divisor
 * @return int quociente
 * @throws RuntimeException
 */
function divide(int $x, int $y): int
{
	try {
		return $x / $y;
	} catch (DivisionByZeroError $ex) {
		// é possível passar uma mensagem e a exceção anterior; também é possível passar um código, mas geralmente não é utilizado
		throw new RuntimeException("Não é possível dividir por 0", previous: $ex);
	}
}

$ex = new RuntimeException("Objeto do tipo RuntimeException");
var_dump($ex);
//throw $ex;

try {
	echo divide(1, 0);
} catch (Exception $ex) {
	echo "Exception em {$ex->getFile()}:{$ex->getLine()}" . PHP_EOL;
	echo $ex->getMessage() . PHP_EOL;

	if (($prev = $ex->getPrevious())) {
		echo "Exception anterior:" . PHP_EOL;
		echo "{$prev->getMessage()} em {$prev->getFile()}:{$prev->getLine()}";
	}
}
