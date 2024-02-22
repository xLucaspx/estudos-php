<?php

$email = "fulano@email.com";
$split = strpos($email, "@");
$usuario = substr($email, 0, $split);

// se quisermos transformar para upper case, existe a função strtoupper
$upper = strtoupper($usuario);
echo $upper . PHP_EOL;

// para lower case, existe a strtolower
echo strtolower($upper) . PHP_EOL;

// estas funções trabalham apenas com caracteres da tabela ASCII; para outros tipos de caracteres,
// é necessário (e recomendado) habilitar e utilizar as funções da extensão mbstring (multi byte string)
$nome = "João Luís";
echo "str: " . strtoupper($nome) . " mb_str: " . mb_strtoupper($nome) . PHP_EOL;
$nome = mb_strtoupper($nome);
echo "str: " . strtolower($nome) . " mb_str: " . mb_strtolower($nome) . PHP_EOL;

// existe também a função mb_convert_case, que recebe a string e o tipo de case desejado:
echo mb_convert_case($nome, MB_CASE_TITLE) . PHP_EOL;

// estas funções não modificam a string original
