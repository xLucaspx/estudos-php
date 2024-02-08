<?php

// no PHP podemos criar arrays associativos da seguinte maneira: 'índice' => valor
// o índice até pode ser um valor numérico, mas é mais comum utilizar strings
$conta1 = [
  'titular' => 'Fulano',
  'saldo' => 1000
];
$conta2 = ['titular' => 'Pafúncio', 'saldo' => 5000.99];
$conta3 = ['titular' => 'Maria', 'saldo' => 3975.89];

// como estamos sobrescrevendo o índice do array, não podemos mais acessar pela posição numérica;
// devemos acessar pelo índice criado:
$titularConta1 = $conta1['titular'];

// criando array de contas
$contas = [$conta1, $conta2, $conta3];

// Quando não definimos o índice de um array, o PHP o faz dessa maneira por baixo dos panos:
$arrIndice = [
  0 => $conta1,
  1 => $conta2,
  2 => $conta3
];

// iterações:

// for comum
for ($i = 0; $i < count($contas); $i++) {
  echo $contas[$i]['titular'] . PHP_EOL;
}

// foreach
foreach ($contas as $conta) {
  $titular = $conta['titular'];
  $saldo = $conta['saldo'];
  echo "Titular: $titular, saldo R$ $saldo" . PHP_EOL;
}

// podemos, também, criar o array desta forma:
$contas = [
  '12345678909' => [
    'titular' => 'Fulano',
    'saldo' => 1000
  ],
  '09876543212' => ['titular' => 'Pafúncio', 'saldo' => 5000.99],
  '18273667890' => ['titular' => 'Maria', 'saldo' => 3975.89]
];

// se o índice do array for alterado, pode não ser possível acessar seus dados em um for normal,
// enquanto o foreach não apresentará problemas para percorrer o array:
// for ($i = 0; $i < count($contas); $i++) echo $contas[$i]['titular'] . PHP_EOL; // warning: Undefined array key

// é possível adicionar dados no array da seguinte maneira:
$contas['66453392810'] = ['titular' => 'Juca', 'saldo' => 578];

// se adicionarmos um item sem índice ao array, o PHP criará o índice deste item incrementando o maior índice numérico do array;
// se o array não tiver índices numéricos ou o PHP não conseguir converter o índice para número, será criado o índice 0.

// temos a opção de nomear e acessar o índice do array no foreach utilizando a seguinte sintaxe:
foreach ($contas as $cpf => $conta) {
  $titular = $conta['titular'];
  $saldo = $conta['saldo'];
  echo "CPF: $cpf; Titular: $titular, saldo R$ $saldo" . PHP_EOL;
}

foreach (array_keys($contas) as $x)
  echo $x . " ";
