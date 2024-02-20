<?php

function retornaMultiplosDe7(int $a, int $b): array
{
  if ($a >= $b)
    throw new Exception("O primeiro valor deve ser menor do que o segundo!");

  $multiplos = [];
  for ($i = $a; $i <= $b; $i++) {
    if ($i % 7 === 0) $multiplos[] = $i;
  }

  return $multiplos;
}

function somaPares(int $a, int $b): int
{
  if ($a >= $b)
    throw new Exception("O primeiro valor deve ser menor do que o segundo!");

  $soma = 0;
  for ($i = $a; $i <= $b; $i++) {
    if ($i % 2 === 0) $soma += $i;
  }

  return $soma;
}

function calculaMediaAritmeticaPares(int $a, int $b): float
{
  if ($a >= $b)
    throw new Exception("O primeiro valor deve ser menor do que o segundo!");

  $soma = 0;
  $pares = 0;
  for ($i = $a; $i <= $b; $i++) {
    if ($i % 2 === 0) {
      $soma += $i;
      $pares++;
    }
  }

  return $soma / $pares;
}

echo count(retornaMultiplosDe7(10, 1000)) . PHP_EOL;
echo somaPares(10, 20) . PHP_EOL;
echo calculaMediaAritmeticaPares(10, 1000) . PHP_EOL;
