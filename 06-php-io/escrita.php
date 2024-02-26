<?php

// se o arquivo não existir, será criado; com o modo 'w' (write), cada vez que o programa roda o arquivo é sobrescrito pois o cursor é
// posicionado no início; para adicionar conteúdo ao arquivo é necessário utilizar 'a' (append), que posiciona o cursor no final do arquivo;
// o melhor lugar para consultar todos os modos de abertura do arquivo é a documentação da função fopen
$file = fopen('txt/cursos-write.txt', 'w');
// $file = fopen('txt/cursos-write.txt', 'a');

// escrevendo linha a linha; é possível passar um terceiro parâmetro, length, o máximo de bytes que será escrito
fwrite($file, 'Design Patterns PHP I - Boas práticas de programação' . PHP_EOL);
// fwrite($file, 'Design Patterns PHP I - Boas práticas de programação' . PHP_EOL, 21); // apenas os primeiros 21 bytes
fwrite($file, 'Design Patterns PHP II - Boas práticas de programação' . PHP_EOL);

fclose($file);

// da mesma forma que file_get_contents, existe a função file_put_contents para abrir um arquivo, escrever o conteúdo e fechar o arquvo:
$curso = 'PHP I/O: trabalhando com arquivos e streams' . PHP_EOL;
// file_put_contents('txt/cursos-write.txt', $curso);

// para não sobrescrever o conteúdo do arquivo, podemos passar a flag FILE_APPEND:
file_put_contents('txt/cursos-write.txt', $curso, FILE_APPEND);
