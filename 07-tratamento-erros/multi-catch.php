<?php

// como é de praxe, podemos ter múltiplos blocos catch para um try
try {
	echo intdiv(5, 0); // Uncaught DivisionByZeroError: Division by zero

	$fixedArr = new SplFixedArray(2);
	$fixedArr[3] = 'Elemento'; // Uncaught RuntimeException: Index invalid or out of range
} catch (RuntimeException) {
	echo "Ocorreu uma RuntimeException!" . PHP_EOL;
} catch (DivisionByZeroError) {
	echo "Não é possível dividir por 0!" . PHP_EOL;
}

// a partir do PHP 7.1 (aproximadamente) existe o multi-catch, que é útil quando
// queremos tratar exceptions de modo semelhante:
try {
	$fixedArr = new SplFixedArray(2);
	$fixedArr[3] = 'Elemento';

	echo intdiv(5, 0);
} catch (RuntimeException|DivisionByZeroError $ex) {
	echo "Ocorreu um erro na execução do programa:" . PHP_EOL;
	echo "{$ex->getMessage()} em {$ex->getFile()}:{$ex->getLine()}" . PHP_EOL;
}

// outra alternativa é utilizar as classes genéricas Exception e Error; inclusive, podemos utilizá-las para tratar
// exceptions e errors de forma diferente. Outra opção (a mais genérica possível) é utilizar Throwable no catch
try {
	// $fixedArr = new SplFixedArray(2);
	// $fixedArr[3] = 'Elemento';

	echo intdiv(5, 0);
} catch (Exception) {
	echo "Ocorreu uma exception na execução do programa:" . PHP_EOL;
} catch (Error) {
	echo "Ocorreu um erro na execução do programa:" . PHP_EOL;
}
