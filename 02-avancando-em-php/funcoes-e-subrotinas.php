<?php

// quando temos um código que sempre realiza a mesma coisa quando é executado, podemos chamá-lo de rotina de execução.
// a partir desta rotina, podemos isolar uma parte específica para executar um trecho de código, por exemplo o trecho de
// exibir uma mensagem e quebrar a linha. A sintaxe para isso no PHP é a seguinte:
function exibeMensagem($mensagem)
{
  echo $mensagem . PHP_EOL;
}

// exibindo a mensagem:
exibeMensagem("Exibindo mensagem e quebrando linha...");

// uma função, diferentemente de um rotina, retorna um valor:
function adiciona2($x)
{
  return $x + 2; // f(x) = x + 2
}

// podemos tipar os parâmetros das funções e subrotinas, e também o retorno das funções
function adiciona5(float $x): float
{
  return $x + 5;
}

// a chamada da função vale seu retorno:
echo adiciona5(2) . PHP_EOL;

// podemos armazenar o retorno da função em uma variável:
$resultado = adiciona2(5);
echo $resultado . PHP_EOL;


$contas = [
  '12345678909' => ['titular' => 'Fulano', 'saldo' => 1000],
  '09876543212' => ['titular' => 'Pafúncio', 'saldo' => 500.99],
  '18273667890' => ['titular' => 'Maria', 'saldo' => 3975.89]
];

// agora imagine que queremos isolar o código de uma funcionalidade, como por exemplo sacar da conta:
$valor = 1500;

if ($contas['09876543212']['saldo'] < $valor) exibeMensagem('Não pode sacar!');
else $contas['09876543212']['saldo'] -= $valor;

// podemos escrever a função da seguinte maneira:
function sacar($conta, $valor)
{
  if ($conta['saldo'] < $valor) exibeMensagem('Não pode sacar!');
  else $conta['saldo'] -= $valor;
  // retornando a conta modificada:
  return $conta;
}

// o parâmetro $conta existe apenas no escopo da função, então após modificar a conta temos que
// retorná-la para que possa ser reatribuída à variável:
$contas['12345678909'] = sacar($contas['12345678909'], 100);

// criando funcionalidade de depositar; podemos definir os tipos dos parâmetros e de retorno da função (a partir da versão 7):
function depositar(array $conta, float $valor): array
{
  if ($valor <= 0) exibeMensagem("O valor do depósito deve ser maior do que 0!");
  else $conta['saldo'] += $valor;

  return $conta;
}

// caso não houvessem sido especificados os tipos, a chamada abaixo lançaria um warning na linha da operação,
// dentro da função; como os parâmetros foram tipados, um erro é lançado na linha da chamada, facilitando a correção

// $contas['18273667890'] = depositar($contas['18273667890'], 'cem reais');

// podemos chamar a função utilizando parâmetros nomeados;
// isso nos permite passar os parâmetros em uma ordem diferente e até pular parâmetros opcionais:

$contas['18273667890'] = depositar(valor: 100, conta: $contas['18273667890']);

foreach ($contas as $cpf => $conta) {
  $titular = $conta['titular'];
  $saldo = $conta['saldo'];
  exibeMensagem("CPF: $cpf; Titular: $titular, saldo R$ $saldo");
}
