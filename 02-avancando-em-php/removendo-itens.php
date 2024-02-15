<?php

$idades = [16, 21, 39, 22, 38, 42, 18];

$contas = [
  '12345678909' => ['titular' => 'Fulano', 'saldo' => 1000],
  '09876543212' => ['titular' => 'Pafúncio', 'saldo' => 500.99],
  '18273667890' => ['titular' => 'Maria', 'saldo' => 3975.89]
];

// no PHP existe a função unset(), que remove uma variável da memória, ou seja,
// exclui esta variável de forma que o PHP não tenha mais acesso a ela e ela deixe de existir
// isso inclui remover itens de arrays:
unset($idades[2], $idades[3], $idades[4]);
unset($contas['09876543212']);

foreach ($idades as $idade) {
  echo "$idade - ";
}

echo PHP_EOL;

foreach ($contas as $cpf => $conta) {
  ['titular' => $titular, 'saldo' => $saldo] = $conta;
  echo "$cpf - $titular - R$ $saldo" . PHP_EOL;
}

$var = "uma variável";
unset($var);
// echo $var; // Undefined variable $var
