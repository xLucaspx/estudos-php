<?php

// podemos "importar" código de outro arquivo utilizando include:
include "interpolacao.php";
// também é possível utilizar a seguinte sintaxe, embora seja menos comum:
// include("interpolacao.php");

// se o arquivo não for encontrado, será exibido um warning;
// só será lançado um erro quando alguma função for chamada e o PHP não encontrá-la.
// isso ocorre pois o PHP entende que o arquivo do include não é obrigatório para o programa

// se quisermos que o arquivo seja obrigatório e o programa não execute sem ele, utilizamos o require:
require "funcoes-e-subrotinas.php";
//  o require é identico ao include, exceto que lança um erro se o arquivo não for encontrado. também possui as mesmas sintaxes:
// require("funcoes-e-subrotinas.php");

// o que ocorre é como se o PHP pegasse todo o conteúdo do arquivo incluído e colasse no lugar da inclusão
// dessa forma, todo o código do arquivo incluído será executado. Se o arquivo for incluído mais de uma vez, será como se o
// código fosse colado novamente, fazendo com que ocorram erros ao tentar redeclarar funções, por exemplo. Para garantir que 
// o arquivo só será incluído se ainda não o foi existem as funções include_once/require_once:
include_once "funcoes-e-subrotinas.php";
require_once "interpolacao.php";

// exibindo mensagem com função de outro arquivo:
exibeMensagem("\nEsta mensagem só será exibida após a execução do include e do require!");

// podemos acessar tudo o que está presente no arquivo incluído:
foreach (array_keys($contas) as $cpf)
  exibeMensagem($cpf);

// a chamada da função vale seu retorno:
exibeMensagem(adiciona2(2));

// podemos armazenar o retorno da função em uma variável:
$resultado = adiciona2(5);
exibeMensagem($resultado);

// reatribuindo o retorno (conta modificada) à variável original
$contas['12345678909'] = sacar($contas['12345678909'], 100);

// caso não houvessem sido especificados os tipos, a chamada abaixo lançaria um warning na linha da operação,
// dentro da função; como os parâmetros foram tipados, um erro é lançado na linha da chamada, facilitando a correção

// $contas['18273667890'] = depositar($contas['18273667890'], 'cem reais');

// podemos chamar a função utilizando parâmetros nomeados;
// isso nos permite passar os parâmetros em uma ordem diferente e até pular parâmetros opcionais:
$contas['18273667890'] = depositar(valor: 100, conta: $contas['18273667890']);
// atente-se que, a partir do primeiro parâmetro nomeado, deve-se nomear os próximos parâmetros, senão o PHP se perde

foreach ($contas as $cpf => $conta) {
  $titular = $conta['titular'];
  $saldo = $conta['saldo'];
  exibeMensagem("CPF: $cpf; Titular: $titular, saldo R$ $saldo");
}
