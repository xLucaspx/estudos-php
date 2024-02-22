<?php

$nome = "Pafúncio";
$idade = 28;
$altura = 1.72;
$peso = 73;
$imc = round($peso / $altura ** 2, 3);

$mensagemImc = match (true) {
  $imc < 18.5 => "abaixo",
  $imc < 25 => "dentro",
  default => "acima"
};

echo "$nome, $idade anos, pesa $peso kg e tem $altura de altura.<br>";
echo "Seu IMC é $imc e está $mensagemImc do recomendado." ;
