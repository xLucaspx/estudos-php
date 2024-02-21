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
// se há apenas um elemento para adicionar, usar o operador [] não só oferece uma sintaxe mais interessante
// como também tem um ínfimo ganho de performance, já que não há uma chamada de função mas somente uma operação

// para remover o primeiro elemento do array, podemos utilizar a função array_shift (perceba a relação dos nomes shift/unshift)
// esta função retorna o elemento removido e reorganiza as chaves do array (numérico) para a esquerda (1 vira 0, 2 vira 1, etc.)
echo array_shift($alunos) . PHP_EOL;

// existe o array_pop para remover o último elemento de um array; o elemento removido é retornado
echo array_pop($alunos) . PHP_EOL;

var_dump($alunos);
