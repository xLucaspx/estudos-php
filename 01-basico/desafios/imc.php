<?php

$altura = 1.72;
$peso = 72;
$imc = $peso / $altura ** 2;

echo "Seu IMC é $imc; Você está ";

if ($imc < 18.5) echo "abaixo ";
else if ($imc < 25) echo "dentro ";
else echo "acima ";

echo "do recomendado.";
