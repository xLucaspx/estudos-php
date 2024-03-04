<?php

// o bloco finally é executado independentemente de haver exceção/erro:
try {
	echo "Executando..." . PHP_EOL;
//	throw new RuntimeException("Exception");
} catch (Throwable) {
	echo "Caiu no catch..." . PHP_EOL;
} finally {
	echo "Dentro do finally" . PHP_EOL;
}

// pode ser utilizado, por exemplo, para fechar streams, evitando repetição de código.
// não é muito utilizado no PHP pois, como não há muitos escopos, bastaria fechar o recurso fora do try-catch.
try {
	$temp = fopen('php://temp', 'w');
	fputs($temp, "escrevendo em arquivo temporário...");
	throw new RuntimeException("Ocorreu uma exception...");
} catch (Throwable $e) {
	echo "{$e->getMessage()} em {$e->getFile()}:{$e->getLine()}" . PHP_EOL;
} finally {
	fclose($temp);
}

// lembrando que o finally pode ser executado sem catch, ou seja
try {
	echo "Bloco try" . PHP_EOL;
} finally {
	echo "Bloco finally" . PHP_EOL;
}

// uma utilidade bem rara, mas possível, é quando temos um try-catch e ambos retornam algo; se for, por algum motivo, necessário
// executar algum código após este bloco, podemos utilizar o finally, que será executado mesmo se houver um retorno:
function testeFinally(): int
{
	try {
		echo "Dentro do try" . PHP_EOL;
		// throw new RuntimeException("Exception aqui!");
		return 0;
	} catch (Throwable) {
		echo "Erro na função" . PHP_EOL;
		return 1;
	} finally {
		echo "Fim da função" . PHP_EOL;
	}
}

echo testeFinally();
