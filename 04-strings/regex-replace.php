<?php

$fones = ["(51)987657711", "5133546798", "(54) 9 8165-0000"];

foreach ($fones as $fone) {
	// substituindo o primeiro grupo de captura (DDD) por (XX) e mantendo o segundo grupo (resto do número)
	echo preg_replace(
		'/^([\(]?[0-9]{2}[\)]?) ?(9? ?[0-9]{4}[ -]?[0-9]{4})$/',
		'(XX) \2',
		$fone
	) . PHP_EOL;

	// formatando o número com regex (devem existir formas melhores)
	echo 'Formatado: ' . preg_replace(
		'/^[\(]?([0-9]{2})[\)]? ?(9?) ?([0-9]{4})[ -]?([0-9]{4})$/',
		'(\1) \2 \3-\4',
		$fone
	) . PHP_EOL;
}

$datas = ["2021-12-15", "2022-05-01", "2022-10-27", "2023-06-06", "2024-02-29", "1800-01-01", "2100-12-12", "2024-15-32"];
$regex = '/^(19\d{2}|20\d{2})-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/'; // datas +- válidas entre 1900 e 2099

foreach ($datas as $data) {
	// os grupos de captura podem ser acessardos tanto com `\n` quanto com `$n`
	echo preg_replace($regex, '$3/$2/$1', $data) . PHP_EOL;
}

// se a string não der match com a regex, nada é substituído
