<?php

spl_autoload_register(function ($nomeCompletoClasse) {
	$ds = DIRECTORY_SEPARATOR;
	$dir = __DIR__;

	$filePath = strtr($nomeCompletoClasse,
		[
			'Senac\\Crud' => 'src',
			'\\' => $ds
		]);

	// get full name of file containing the required class
	$filePath = "{$dir}{$ds}{$filePath}.php";

	// get file if it is readable
	if (is_readable($filePath)) require_once $filePath;
});
