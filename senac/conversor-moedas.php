<?php

define('EURO', 5.34);
define('DOLAR', 4.96);
define('LIBRA_ESTERLINA', 6.25);
define('PESO_ARGENTINO', 0.0059);

function converteParaMoeda(float $valorEmReais, float $valorMoeda): float
{
	return round($valorEmReais / $valorMoeda, 2);
}

$valorEmReais = 10;
$moedas = [
	'Euro' => ['cotacao' => EURO, 'codigo' => 'EUR'],
	'Dólar' => ['cotacao' => DOLAR, 'codigo' => 'USD'],
	'Libra Esterlina' => ['cotacao' => LIBRA_ESTERLINA, 'codigo' => 'GBP'],
	'Peso Argentino' => ['cotacao' => PESO_ARGENTINO, 'codigo' => 'ARS']
];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Conversor de moedas</title>
</head>

<body>
	<h1>Conversor de moedas</h1>
	<?php printf("<h2>Valor a ser convertido: R$ %.2f</h2>", $valorEmReais); ?>

	<dl>
		<?php foreach ($moedas as $nomeMoeda => $moeda) {
			['cotacao' => $cotacao, 'codigo' => $codigo] = $moeda;
			?>
			<dt>
				<?= "<h3>Conversão para $nomeMoeda, cotação R$ $cotacao"; ?>
			</dt>
			<dd>
				<?php printf("Valor: %.2f %s", converteParaMoeda($valorEmReais, $cotacao), $codigo); ?>
			</dd>
		<?php } ?>
	</dl>
</body>

</html>
