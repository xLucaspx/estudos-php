<?php

spl_autoload_register(function ($nomeCompletoClasse) {
	// o PHP usa um autoloader para tentar carregar as classes que não conhece; para acessar este autoloader,
	// utiliza-se spl_autoload_register passando a função que deve ser executada por parâmetro; esta função receberá
	// o nome completo da classe. Pode-se observar isso ao descomentar a linha abaixo e executar um arquivo com imports
	//	echo $nomeCompletoClasse . PHP_EOL;

	// o que queremos é transformar este nome completo da classe no seu caminho; por exemplo:
	// Curso\Banco\Model\Endereco -> src/Model/Endereco.php

	$filePath = strtr($nomeCompletoClasse,
		[
			'Curso\\Banco' => 'src',
			'\\' => DIRECTORY_SEPARATOR
		]);
	$filePath .= '.php';

	if (file_exists($filePath)) require_once($filePath);
});
