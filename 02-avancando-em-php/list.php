<?php

$idades = [16, 21, 39, 22, 38, 42, 18];

// imagine que queremos pegar os três primeiros elementos e atribuí-los à variáveis:
$idadeA = $idades[0];
$idadeB = $idades[1];
$idadeC = $idades[2];

// existe a função list() para fazer isso:
list($idade1, $idade2, $idade3) = $idades;

// para pular um elemento, podemos fazer o seguinte:
list($primeiroElemento, , $terceiroElemento) = $idades;

echo "$idadeA - $idade1 - $primeiroElemento" . PHP_EOL;
echo "$idadeB - $idade2" . PHP_EOL;
echo "$idade3 - $idade3 - $terceiroElemento" . PHP_EOL;

// para arrays associativos sem índice numérico, deve-se passar o índice de cada valor;
// não é possível misturar as duas sintaxes (Cannot mix keyed and unkeyed array entries in assignments)
$contas = [
  '12345678909' => ['titular' => 'Fulano', 'saldo' => 1000],
  '09876543212' => ['titular' => 'Pafúncio', 'saldo' => 500.99],
  '18273667890' => ['titular' => 'Maria', 'saldo' => 3975.89]
];

foreach ($contas as $cpf => $conta) {
  // list($titular, $saldo) = $conta; // Warning: Undefined array key
  list('titular' => $titular, 'saldo' => $saldo) = $conta;
  echo "$cpf - $titular - R$ $saldo" . PHP_EOL;
}

// a partir do PHP 7.1 pode-se utilizar a sintaxe reduzida, similar ao array:
[$a, $b, $c, $d] = $idades;
[5 => $penultimo, 6 => $ultimo] = $idades;
['titular' => $titular, 'saldo' => $saldo] = $contas['12345678909'];

echo "$a - $b - $c - $d" . PHP_EOL;
echo "$penultimo - $ultimo" . PHP_EOL;
echo "$titular - $saldo" . PHP_EOL;
