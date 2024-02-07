<?php

echo "Concatenação\nCom aspas simples, não é possível interpolar variáveis ou iserir quebras de linha." . PHP_EOL;
echo "É necessário utilizar o operador `.` para concatenação:\n\n";

$idade = 21;

echo 'Olá, mundo! Minha idade é ' . $idade . ' anos.';

echo "\n\nCom aspas duplas, a interpretação, concatenação e a interpolação são mais simples:\n\n";

$nome = "Pafúncio";
$email = "email@teste.com";

echo "Meu nome é $nome e meu e-mail é $email" . PHP_EOL . PHP_EOL;

echo 'As quebras de linha pode ser tanto escapadas com \n ou \r\n quanto sinalizadas pela constante PHP_EOL, que utiliza o padrão do SO' . PHP_EOL;
echo "Além disso, existem muitos outros caracteres de escape que podem ser utilizados, como o \ttab (\\t)" . PHP_EOL;

