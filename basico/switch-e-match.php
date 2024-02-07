<?php

abstract class Question
{
}
class Single extends Question
{
}
class Multiple extends Question
{
}

$input = 'multi';

// o switch apresenta os problemas de sempre: não podemos esquecer o break, o default, etc.

switch ($input) {
  case 'single':
    $question = new Single();
    break;
  case 'multi':
    $question = new Multiple();
    break;
  default:
    throw new Exception('Valor inválido');
}

// PHP não tem escopo de bloco, então uma variável definida dentro de um bloco passa a existir fora dele:
var_dump($question);

$inputMatch = 'multiple';
/*A partir do PHP 8 podemos utilizar Match Expressions; no PHP, tudo que se pode atribuir a uma variável é uma expressão;
além disso expressões sempre terminam com `;` (inclusive funções anônimas).
O switch não pode ser atribuído a uma variável, mas o match pode:*/

$questionMatch = match ($inputMatch) {
  'single' => new Single(),
  'multi', 'multiple' => new Multiple(), // utilizando mais de um valor separado por vírgula
  default => throw new Exception('Exceção personalizada')
};

/* match expressions não precisam de break ou default; como é uma expressão, ela não tem um retorno, mas na verdade vale
o valor da sua avaliação. Em outras palavras, se a expressão não conseguir resolver o valor, lançará uma exception.
Porém, caso queira, é possível criar um default e/ou jogar uma exceção (throw virou uma expressão a partir do PHP 8).

no switch, pode haver coerção de tipos, o que pode trazer resultados inesperados. É como se o switch utilizasse o operador `==`.
Já o match não faz coerção de tipos, utilizando a comparação estrita (`===`) e evitando comportamentos inesperados.

No momento, match expressions suportam apenas expressões, não sendo possível utilizar blocos.
*/

var_dump($questionMatch);
