<?php

// a função strlen retorna o tamanho da string em BYTES; ou seja, caracteres que precisam de mais de 1b para
// serem armazenados irão aumentar o tamanho da string, mas não o número de caracteres:
echo strlen("aeiou") . PHP_EOL; // 5
echo strlen("áèîõü") . PHP_EOL; // 10

// para evitar isso podemos utilizar a função mb_strlen
echo mb_strlen("aeiou") . PHP_EOL; // 5
echo mb_strlen("áèîõü") . PHP_EOL; // 5

$senhas = ['123', 'abc123cde', 'abc', '#senha01'];

foreach ($senhas as $senha) {
	$size = mb_strlen($senha);

	if ($size >= 8)
		echo "tamanho: $size, a senha '$senha' é segura" . PHP_EOL;
	else
		echo "tamanho: $size, a senha '$senha' não é segura" . PHP_EOL;
}

// strings podem ser acessadas como arrays:
$user = 'fulano';
$user[0] = mb_strtoupper($user[0]);
echo $user . PHP_EOL;

$senha = '123';
echo "$senha[0] - $senha[1] - $senha[2]" . PHP_EOL;

// PORÉM não são arrays, então algumas operações não podem ser executadas:

// foreach ($senha as $key => $value) // argument must be of type array|object, string given

// com for normal é possível,  mas não é a forma correta
