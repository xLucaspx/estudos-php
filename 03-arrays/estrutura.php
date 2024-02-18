<?php

$array1 = array(1, 2, 3);
$array2 = [1, 2, 3];
$array3 = [
	1 => 'um',
	2 => 'dois',
	3 => 'três',
];

// quando utilizamos arrays associativos, a chave deve ser inteiros ou strings
// qualquer outro valor será convertido para inteiro, e valores repetidos serão substituídos (redefinidos):
$array4 = [
	1 => "um",
	true => "dois",
	1.9 => "três"
];
// basicamente: floats terão a parte decimal removida e boleanos serão 0 (false) 1 (true)
var_dump($array4);

// na verdade, o PHP sempre utiliza arrays associativos; quando não definimos as chaves o PHP define
// automaticamente começando em 0 e incrementando. Quando definimos algumas das chaves, o PHP tenta
// convertê-las para incrementar as que não definimos; se não conseguir, começa em 0 e vai incrementando

// arrays no PHP não são espaços contínuos armazenados na RAM como em grande parte das linguagens;
// o PHP utiliza, por baixo dos panos, uma estrutura chamada de Hash Table
