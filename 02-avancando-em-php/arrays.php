<?php

// arrays podem ser definidos da seguinte maneira:
$idades = array(21, 23, 19, 25, 30, 41, 18);
// a partir do PHP 5.4, não é mais necessário escrever a palavra array:
$idades = [16, 21, 39, 22, 38, 42, 18];

// para acessar os dados de um array, fazemos:
$primeiroItem = $idades[0];
$quintoItem = $idades[4];

// descobrindo o tamanho da lista:
echo "Tamanho: " . count($idades) . PHP_EOL;

// adicionando item pelo indice
$idades[count($idades)] = 25;
// adicionando pelo próximo índice numérico disponível
$idades[] = 30;
// modificando pelo índice
$idades[2] = 37;

// iterando:
for ($i = 0; $i < count($idades); $i++) {
	echo "$idades[$i] ";
}
