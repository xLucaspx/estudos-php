<?php

// podemos utilizar a função trim() para remover espaços nas extremidades de uma string:
$email = "	fulano@email.com     ";

echo "E-mail: <" . trim($email) . ">" . PHP_EOL;

// trim, no PHP, aceita um segundo parâmetro: o que deve ser removido:
$csv = ",.Lucas Oliveira,22,Engenharia de Software.,..";
echo trim($csv, ".,") . PHP_EOL; // não importa a ordem; enquanto o PHP encontrar os caracteres presentes no parâmetro, ele vai removendo

// para aparar apenas no início ou no fim da string, utiliza-se ltrim (left) e rtrim (right)
echo ltrim($csv, ",.") . PHP_EOL;
echo rtrim($csv, ".,") . PHP_EOL;
