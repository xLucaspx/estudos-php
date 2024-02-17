<?php

// quando temos um código que sempre realiza a mesma coisa quando é executado, podemos chamá-lo de rotina de execução.
// a partir desta rotina, podemos isolar uma parte específica para executar um trecho de código, por exemplo o trecho de
// exibir uma mensagem e quebrar a linha. A sintaxe para isso no PHP é a seguinte:
function exibeMensagem($mensagem)
{
  echo $mensagem . PHP_EOL;
}

// uma função, diferentemente de um rotina, retorna um valor.
// podemos tipar os parâmetros das funções e subrotinas, e também o retorno das funções (a partir da versão 7):
function adiciona2(float $x): float
{
  return $x + 2; // f(x) = x + 2
}

// imagine que queremos isolar o código de uma funcionalidade, como por exemplo de saque:
/*
$valor = 1500;
if ($contas['09876543212']['saldo'] < $valor) exibeMensagem('Não pode sacar!');
else $contas['09876543212']['saldo'] -= $valor;
*/
// podemos escrever a função da seguinte maneira:
function sacar(array $conta, float $valor): array
{
  if ($conta['saldo'] < $valor)
    exibeMensagem('Não pode sacar!');
  else
    $conta['saldo'] -= $valor;
  // retornando a conta modificada; o parâmetro $conta existe apenas no escopo da função,
  // então após modificar a conta temos que retorná-la para que possa ser reatribuída
  return $conta;
}

function depositar(array $conta, float $valor): array
{
  if ($valor <= 0)
    exibeMensagem("O valor do depósito deve ser maior do que 0!");
  else
    $conta['saldo'] += $valor;

  return $conta;
}

function exibeConta(array $conta) {
  ['titular' => $titular, 'saldo' => $saldo] = $conta;
  echo "<li>Titular: $titular, Saldo R$ $saldo</li>";
}

$contas = [
  '12345678909' => ['titular' => 'Fulano', 'saldo' => 1000],
  '09876543212' => ['titular' => 'Pafúncio', 'saldo' => 500.99],
  '18273667890' => ['titular' => 'Maria', 'saldo' => 3975.89]
];
