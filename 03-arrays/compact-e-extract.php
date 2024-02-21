<?php

$dados = [
	'nome' => 'Fulano',
	'nota' => 7.5,
	'idade' => 22
];

// a função extract verifica as chaves do array e as transforma em variáveis:
extract($dados);
// esta função deve ser utilizada com cautela e apenas em dados criados no código ou
// em dados que já foram limpos e verificados, para evitar injeção de código malicioso
var_dump($nome, $nota, $idade);

// já a função compact pega várias variáveis e transforma em um array com as chaves
// como o nome das variáveis:
$nome = 'Juca';
$idade = 27;
$nota = 8.3;

$dados = compact('nome','idade','nota'); // passando o nome das variáveis como string

var_dump($dados);
