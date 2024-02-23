<?php

$fones = ["(51) 98765-7711", "51 33546798", "(54) 9 8165-0000"];

foreach ($fones as $fone) {
	$foneValido = preg_match('/^[\(]?[0-9]{2}[\)]? ?9? ?[0-9]{4}[ -]?[0-9]{4}$/', $fone);

	if ($foneValido) echo "Telefone válido: $fone" . PHP_EOL;
	else echo "Telefone inválido: $fone" . PHP_EOL;
}

$fones = ["hahah (51) 98765-7711 str", "strstr51 33546798]]]", "{(54) 9 8165-0000}"];

foreach ($fones as $fone) {
	// mesmo se não utilizarmos os delimitadores (^ e $), podemos recuperar apenas os matches para cada expressão
	// a função preg_match pode receber um terceiro parâmetro: uma variável passada por referência que irá armazenar
	// os matches em um array; se tivermos grupos de captura, cada grupo será um item do array
	$foneValido = preg_match('/[\(]?([0-9]{2})[\)]? ?9? ?[0-9]{4}[ -]?[0-9]{4}/', $fone, $verificacoes); // grupo de captura DDD

	var_dump($verificacoes);
}

// podemos ainda passar flags e offset para esta função
