<?php

$alunos = [
	'Vinicius',
	'Ana',
	'Roberto',
	'Maria',
	'João',
];

// para adicionar elementos ao final do array podemos utilizar a função array_push,
// que recebe um array como referência e os elementos que se quer adicionar:
array_push($alunos, 'Pafúncio', 'Cleber', 'Rosaura', 'Kelly', "Marcos", "Juca");
// para adicionar elementos no início do array podemos utilizar array_unshift:
array_unshift($alunos, "Felipe", "Eduardo");
// estas funções modificam o array original e retornam a quantidade de elementos que ele passou a ter

// para adicionar apenas um elemento ao final do array podemos utilizar a seguinte sintaxe:
$alunos[] = "Célia";

// para remover o primeiro elemento do array, podemos utilizar a função array_shift (perceba a relação dos nomes shift/unshift)
// esta função retorna o elemento removido e reorganiza todas as chaves numéricas do array para a esquerda (1 vira 0, 2 vira 1, etc.)
echo array_shift($alunos);

var_dump($alunos);
