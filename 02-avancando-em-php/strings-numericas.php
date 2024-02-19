<?php

function exibeNumero(int|float $numero): void
{
	var_dump($numero);
}

$teste = 123;
var_dump($teste); // int(123)
$teste = '123';
var_dump($teste); // string(3) "123"

// o PHP consegue realizar a conversão explícita de strings numéricas:
var_dump((int) $teste); // int(123)

// também consegue realizar a conversão implícita:
exibeNumero($teste); // int(123)

/* no PHP 8 houve a RFC Saner Numeric Strings, que trata como strings numéricas apenas strings numéricas realmente válidas
antes disso, qualquer string que começasse com números era interpretada como uma string numérica e o PHP apenas lançava um aviso
agora, uma string numérica pode ser: */
echo "\nExemplos de strings numéricas válidas:" . PHP_EOL;
echo "uma string que contenha apenas números: ";
exibeNumero('123');
echo "uma string que contenha apenas números e espaços: ";
exibeNumero('    123		');
echo "uma string que comece com espaços mas contenha apenas números: ";
exibeNumero('    123');
echo "uma string que comece números e contenha apenas espaços após: ";
exibeNumero('123		');

echo "\nExemplos de strings numéricas inválidas:" . PHP_EOL;
var_dump('1 2 3'); // string(5) "1 2 3"
var_dump('123 D'); // string(5) "123 D"

/* para comparações entre números e strings, antes do PHP 8 qualquer string não numérica era convertida para 0
agora, se a string for numérica, ela será tratada como número; caso contrário, o número será convertido para string */
echo "\nComparações:" . PHP_EOL;
var_dump(0 == 'abc'); // false (true antes do php 8)
var_dump(0 == '0'); // true
var_dump(0 < '42'); // true
