<?php

$mdLines = [
	'# Este é um texto em Markdown',
	'## Para títulos de 1 a 6 utiliza-se a quantidade de caracteres # correspondentes',
	'### Título 3',
	'#### Título 4',
	'##### Título 5',
	'###### Título 6',
	'Para texto em **negrito**, envolve-se entre **dois asteriscos (\*\*)**!',
	'Para texto em _itálico_, envolve-se entre _underline (\_)_!',
	'Para `código simples`, utiliza-se `crase/backtick (\`)`!',
];

$htmlLines = [];

foreach ($mdLines as $line) {

	// Envolvendo linhas que não são título (1 a 6 #) em tag <p>
	$htmlLine = preg_replace(
		'/^(?!#{1,6}\s)(.*)$/',
		'<p>$1</p>',
		$line
	);

	// Títulos # para <h1>
	$htmlLine = preg_replace(
		'/^#\s(.+)$/i',
		'<h1>$1</h1>',
		$htmlLine
	);

	// Títulos ## para <h2>
	$htmlLine = preg_replace(
		'/^#{2}\s(.+)$/i',
		'<h2>$1</h2>',
		$htmlLine
	);

	// Títulos ### para <h3>
	$htmlLine = preg_replace(
		'/^#{3}\s(.+)$/i',
		'<h3>$1</h3>',
		$htmlLine
	);

	// Títulos #### para <h4>
	$htmlLine = preg_replace(
		'/^#{4}\s(.+)$/i',
		'<h4>$1</h4>',
		$htmlLine
	);

	// Títulos ##### para <h5>
	$htmlLine = preg_replace(
		'/^#{5}\s(.+)$/i',
		'<h5>$1</h5>',
		$htmlLine
	);

	// Títulos ###### para <h6>
	$htmlLine = preg_replace(
		'/^#{6}\s(.+)$/i',
		'<h6>$1</h6>',
		$htmlLine
	);

	// Negrito ** para <strong>
	$htmlLine = preg_replace(
		'/\*{2}([^*\\\\]*(?:\\\\.[^*\\\\]*)*)\*{2}/i',
		'<strong>$1</strong>',
		$htmlLine
	);

	// Itálico _ para <em>
	$htmlLine = preg_replace(
		'/_([^_\\\\]*(?:\\\\.[^_\\\\]*)*)_/i',
		'<em>$1</em>',
		$htmlLine
	);

	// Inline code ` para <code>
	$htmlLine = preg_replace(
		'/`([^`\\\\]*(?:\\\\.[^`\\\\]*)*)`/i',
		'<code>$1</code>',
		$htmlLine
	);

	$htmlLine = strtr($htmlLine, [
		'\*' => '*',
		'\_' => '_',
		'\`' => '`'
	]);

	$htmlLines[] = $htmlLine;
}
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Conversor</title>

	<style>
		html {
			font-family: monospace;
		}

		code {
			/*color: #EB5757;*/
			background: rgba(135, 131, 120, .15);
			color: #FF5555;
			/*background: rgba(158,167,179,0.4);*/
			padding: 0.2em 0.4em;
			border-radius: 5px;
		}
	</style>
</head>
<body>
<?php foreach ($htmlLines as $line) {
	echo "$line" . PHP_EOL;
} ?>
</body>
</html>
