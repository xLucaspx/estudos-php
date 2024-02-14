<?php

$contas = [
  '12345678909' => ['titular' => 'Fulano', 'saldo' => 1000],
  '09876543212' => ['titular' => 'Pafúncio', 'saldo' => 500.99],
  '18273667890' => ['titular' => 'Maria', 'saldo' => 3975.89]
];

// ao trabalhar com dados mais complexos, como arrays associativos, existe o que o PHP chama de strings simples e complexas.

// na forma simples, removemos as aspas ao acessar o elemento de um array dentro de uma string:
foreach ($contas as $cpf => $conta) {
  echo "CPF: $cpf, Titular: $conta[titular], Saldo R$ $conta[saldo]" . PHP_EOL;
  // atenção: essa sintaxe só funciona dentro de uma string!
}

// a forma complexa não quer dizer que é mais difícil, mas sim que permite avaliar expressões complexas.
// para utilizar a forma complexa, envolve-se o código dentro da string entre chaves, mantendo a sintaxe original:
foreach ($contas as $cpf => $conta) {
  echo "CPF: $cpf, Titular: {$conta['titular']}, Saldo R$ {$conta['saldo']}" . PHP_EOL;
}

// na prática, a forma complexa oferece mais funcionalidades e mantém um padrão de sintaxe no código, tornando-a mais recomendada.
