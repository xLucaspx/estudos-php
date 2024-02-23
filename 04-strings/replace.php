<?php

$texto = "Texto com qualquer c0isa poxa e caramba";

// a função str_replace retrona uma nova string com as substituições desejadas
echo str_replace("poxa", "***", $texto) . PHP_EOL;

// se queremos substituir mais de uma coisa, passamos arrays
echo str_replace(
	['poxa', 'caramba'],
	'***',
	$texto
) . PHP_EOL;

// podemos utilizar arrays para substituir o elemento correspondente do primeiro array pelo do segundo;
// se o primeiro array for maior do que o segundo, as strings restantes são substituídas por uma string vazia
echo str_replace(
	['poxa', 'caramba', 'c0isa'],
	['p***', 'cara***'],
	$texto
) . PHP_EOL;

// a função strtr (de string translate) trabalha com caracteres ao invés de palavras:
echo strtr($texto, 'poxa', '**@') . PHP_EOL; // Te@t* c*m qualquer c0isa **@a e caramba
// no caso, substitui o caractere do segundo parâmetro pelo correspondente do terceiro, ou ignora se o segundo for maior

// se quisermos utilizar a função strtr para trabalhar com strings ao invés de caracteres, existe uma variação que recebe apenas
// dois parâmetros: o texto  e um array associativo, onde a chave é o que queremos substituir e o valor a substituição
echo strtr($texto, ['poxa' => 'p***', 'caramba' => 'cara***', 'o']) . PHP_EOL;

// diferença entre strtr e str_replace: ambos percorrem toda a string realizando substituições para cada parâmetro, porém
// o strtr "se lembra" do que já modificou e não substitui novamente, diferentemente da str_replace:
$string = "hi all, I said hello";
echo strtr($string, ['hello' => 'hi', 'hi' => 'hello']) . PHP_EOL; // hello all, I said hi
echo strtr($string, ['hi' => 'hello', 'hello' => 'hi']) . PHP_EOL; // hello all, I said hi

echo str_replace(['hello', 'hi'], ['hi', 'hello'], $string) . PHP_EOL; // hello all, I said hello
echo str_replace(['hi', 'hello'], ['hello', 'hi'], $string) . PHP_EOL; // hi all, I said hi
