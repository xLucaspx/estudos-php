<?php

$idade = 21;
$limite = 18;
$limiteAcompanhado = 16;
$acompanhado = true;

echo "Só pode entrar se tiver a partir de $limite anos ou a partir de $limiteAcompanhado anos e estiver acompanhado(a)" . PHP_EOL;
echo "Você tem $idade anos; ";

if ($idade >= $limite) {
  echo "pode entrar!" . PHP_EOL;
} else if ($idade >= $limiteAcompanhado && $acompanhado) {
  echo "está acompanhado(a), pode entrar!" . PHP_EOL;
} else
  echo "não pode entrar..." . PHP_EOL;

echo "\nQuando há apenas uma linha no bloco a ser executado, podemos omitir as chaves ({})". PHP_EOL;
echo "A sintaxe nos permite, também, utilizar tanto \"else if\" quanto \"elseif\"". PHP_EOL;
echo "O PHP também permite o uso do operador ternário:\n". PHP_EOL;

$mensagem = $idade >= 18 ? "Você é maior de idade" : "Você é menor de idade";
echo $mensagem . PHP_EOL;


echo "\nNo PHP, podemos utilizar os operadores de comparação da seguinte maneira:" . PHP_EOL;
echo "- Maior (>), maior ou igual (>=);" . PHP_EOL;
echo "- Menor (<), menor ou igual (<=);" . PHP_EOL;
echo "- Igualdade (==), diferente (!=);" . PHP_EOL;
echo "- OU: || / or;" . PHP_EOL;
echo "- E: && / and." . PHP_EOL;

echo "Os operadores de comparação (<, >, ==, !=) têm a mesma precedência,
logo serão avaliados da esquerda para a direita na expressão" . PHP_EOL;
echo "Os outros operadores são aplicados na seguinte ordem: (&&, ||, and, or)" . PHP_EOL;


$comparacaoOr = $idade > 10 || $idade < 30 or $idade == 42;
$comparacaoAnd = $idade > 10 && $idade < 50 and $idade != 42;
