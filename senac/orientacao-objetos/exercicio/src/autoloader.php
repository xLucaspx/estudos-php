<?php

spl_autoload_register(function ($nomeCompletoClasse) {

	$filePath = strtr($nomeCompletoClasse,
		[
			'Senac\\OO\\' => '',
			'\\' => DIRECTORY_SEPARATOR
		]);
	$filePath .= '.php';

	if (file_exists($filePath)) require_once($filePath);
});
