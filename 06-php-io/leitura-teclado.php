<?php

// para ler algo do teclado utilizamos 'php://stdin'; independente do modo passado para fopen, o stdin sempre será leitura
$stdin = fopen("php://stdin", "r");
// resources que começam com 'php://' não precisam ser fechados pois o PHP é inteligente o suficiente para ele próprio fechar

echo "Digite o nome do novo curso: ";
$curso = fgets($stdin); // fgets pega todos os caracteres até a quebra de linha, incluíndo a quebra de linha;
// se não quisermos a quebra de linha, é possível utilizar o trim(), por exemplo

// o PHP fornece uma grande facilidade para ler entrada do teclado: a constante STDIN, que já traz o recurso aberto;
// ou seja, não precisamos utilizar fopen;
echo "Digite o nome de outro curso: ";
$curso .= fgets(STDIN);

$filename = 'txt/cursos-write.txt';
file_put_contents($filename, $curso, FILE_APPEND);

echo "O arquivo $filename foi atualizado";
