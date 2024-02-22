<?php

$csv = "Lucas Oliveira,22,lucas@email.com";

// para dividir uma string em strings diferentes, podemos utilizar a função explode
[$usuario, $idade, $email] = explode(",", $csv);
// também podemos utilizar mb_split, mas neste caso o funcionamento de ambas é muito semelhante
[$nome, $sobrenome] = mb_split(" ", $usuario);

echo "Nome: $nome" . PHP_EOL;
echo "Sobrenome: $sobrenome" . PHP_EOL;
echo "Idade: $idade" . PHP_EOL;
echo "E-mail: $email" . PHP_EOL;

// o explode também pode receber um terceiro parâmetro: limit; isso vai definir o tamanho máximo do
// array retornado. A última posição do array irá conter o resto da string
var_dump(explode(" ", "1 2 3 4", 2)); // ['1', '2 3 4']

// se tempos um array e queremos juntar as informações em uma string podemos utilizar o implode
// essa função recebe um catactere que vai ser a "cola" (glue) entre os valores:
$fones = ["(51) 98765-7711", "51 33546798", "(54) 9 8165-0000"];

echo implode(", ", $fones) . PHP_EOL; // unindo com ,
echo implode(PHP_EOL, $fones); // exibindo cada um em uma linha
