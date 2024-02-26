<?php

$file = fopen("txt/lista-cursos.txt", 'r');

// a função fread é capaz de ler o arquivo inteiro; para isso, ela recebe o arquivo e a quantidade
// de bytes que queremos ler, ou seja, para ler o arquivo inteiro de uma só vez é necessário saber
// seu tamanho em bytes; para isso, utiliza-se filesize, que recebe o caminho para o arquivo
$size = filesize('txt/lista-cursos.txt');
$cursos = fread($file, $size);

fclose($file);

echo $cursos;
echo "Tamanho do arquivo: $size bytes" . PHP_EOL;

// por padrão, o limite de memória que o PHP pode utilizar é de 128 MB; se o arquivo for maior do que
// isso, não será possível ler desta forma (e nem mesmo é recomendado).

// existe uma forma bem mais simplificada: a função file_get_contents abre o arquivo, retorna todo seu
// conteúdo como string e fecha o arquivo, tudo com apenas uma função; além disso, pode receber outros parâmetros
$file = file_get_contents('txt/lista-cursos.txt');
echo $file . PHP_EOL;

// já a função file devolve cada linha do arquivo como um item em um array:
var_dump(file('txt/lista-cursos.txt'));
