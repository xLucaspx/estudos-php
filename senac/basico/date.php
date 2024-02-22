<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Date</title>
</head>

<body>
	<?php
	$date = getdate();

		print_r($date);
		echo "<hr>";

		var_dump($date);
		echo "<hr>";
		?>

<dl>
		<?php foreach ($date as $key => $value) { ?>
			<dt>
				<?= "<h3>Chave: $key</h3>"; ?>
			</dt>
			<dd>
				<?= "Valor: $value" ?>
			</dd>
		<?php } ?>
	</dl>

</body>
</html>
