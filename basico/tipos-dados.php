<?php

echo "Tipos primitivos:\n";

$nome = "Pafúncio";
$idade = 21;
$salario = 1000.25;
$booleano = true;

echo "O nome é " . gettype($nome) . "\n";
echo "A idade é " . gettype($idade) . "\n";
echo "O salário é " . gettype($salario) . " (decimal também pode ser float)\n";
echo "booleano é " . gettype($booleano) . "\n";

echo "\nTipagem dinâmica\n";

$divisao = 10 / 3;
echo "O resultado da divisão é " . gettype($divisao) . "\n";

$divisao = 10 / 2;
echo "Agora o resultado da divisão é " . gettype($divisao) . "\n";

