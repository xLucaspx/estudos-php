<?php

/*
A chave pode ser um int ou uma string. O valor pode ser de qualquer tipo.

Adicionalmente, as seguintes coerções ocorrerão a chave:

- strings contendo quaisquer ints válidos, que não sejam precedidos do sinal de +, serão convertidos para o tipo int.
Por exemplo, a chave "8" será, na verdade, armazenada como 8. Entretanto, "08" não será convertido, por não ser um inteiro decimal válido.

- floats também são convertidos para ints, isso significa que a parte fracionária será removida.
Por exemplo, a chave 8.7 será na verdade armazenada como 8.

- bools são convertidos para ints, igualmente, por exemplo, a chave true, será na verdade armazenada como 1 e a chave false como 0.

- null será convertido para uma string vazia, por exemplo, a chave null na verdade será armazenada como "".

- arrays e objects não podem ser usados como chaves. Fazer isso resultará em um aviso: Illegal offset type.

Se vários elementos na declaração do array utilizam a mesma chave, apenas o último será utilizado, enquanto todos os outros serão sobrescritos.
*/

$array = [
  1 => 'a',
  '1' => 'b',
  1.5 => 'c',
  true => 'd',
];

foreach ($array as $item) {
  echo $item . PHP_EOL;
}

var_dump($array);
