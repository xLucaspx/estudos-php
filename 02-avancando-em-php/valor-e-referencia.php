<?php

require "funcoes-e-subrotinas.php";

// desta forma, o PHP copia o valor do que está sendo passado por parâmetro, e não uma referência para o  endereço de memória;
// em outras palavras, não estamos modificando o mesmo objeto, mas uma cópia que só existe no escopo da função.
function titularComLetrasMaiusculasValor(array $conta): void
{
  $conta['titular'] = mb_strtoupper($conta['titular']);
  exibeMensagem($conta['titular']);
}

// exibe o nome em maiúsculo dentro da função, mas não altera o valor original
titularComLetrasMaiusculasValor($contas['12345678909']); // FULANO
exibeMensagem($contas['12345678909']['titular']); // fulano

// o E comercial (&) antes do nome do parâmetro indica que queremos receber uma referência para o objeto, e não uma cópia com o valor
function titularComLetrasMaiusculasReferencia(array &$conta): void
{
  $conta['titular'] = mb_strtoupper($conta['titular']);
}

// agora está realmente alterando as contas originais:
foreach (array_keys($contas) as $key) {
  titularComLetrasMaiusculasReferencia($contas[$key]);
  exibeMensagem($contas[$key]['titular']);
}

// normalmente, em casos assim, se utiliza a passagem por valor, até mesmo para garantir a segurança dos dados;
// ao utilizar a passagem por referência se dá acesso a outros atributos da conta, como por exemplo o saldo, que 
// poderia ser indevidamente modificado. Cada caso tem suas utilidades e deve-se sempre avaliar o que a situação pede!
