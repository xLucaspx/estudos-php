<?php

// números primos deveme possuir apenas dois divisores: 1 e ele mesmo
function isPrimo(int $numero): bool
{
	if ($numero <= 1) return false;

	$raiz = round(sqrt($numero));
	// iterando apenas até a raiz; após sua raíz, o número não será divisível por ninguém exceto ele mesmo;
	// começando em 2 pois todos os números são divisíveis por 1
	for ($i = 2; $i <= $raiz; $i++) {
		if ($numero % $i === 0) return false;
	}

	return true;
}

$numeros = [
	'pares' => [],
	'impares' => [],
	'primos' => [],
];
$begin = 1;
$end = 500;

for ($i = $begin; $i <= $end; $i++) {
	if (isPrimo($i)) $numeros['primos'][] = $i;

	if ($i % 2 === 0) {
		$numeros['pares'][] = $i;
		continue;
	}

	$numeros['impares'][] = $i;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pares e ímpares</title>
</head>

<body style="font-family: monospace; font-size: 14px;">
	<h1>
		<?= "Números entre $begin e $end" ?>
	</h1>

	<dl>
		<?php foreach ($numeros as $type => $array) { ?>
			<dt>
				<?= "<h3>Números $type</h3>"; ?>
			</dt>
			<dd>
				<?php
				$size = count($array);
				for ($i = 0; $i < $size; $i++) {
					echo sprintf("%'03d", $array[$i]);
					if ($i !== ($size - 1))
						echo ", ";
				}
				?>
			</dd>

			<dd><?= "Total: $size" ?></dd>
		<?php } ?>
	</dl>
</body>

</html>
