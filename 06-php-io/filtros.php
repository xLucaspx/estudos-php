<?php

require_once "FiltroPartes.php";

$file = fopen('txt/lista-cursos.txt', 'r');

// podemos adicionar filtros à streams; podemos criar filtros ou utilizar os que vem pré-definidos;
// se antes de realizar o processamento principal que é necessário em uma stream for preciso realizar
// alguma espécie de transformação no conteúdo original, filtros de stream podem ser uma solução elegante

var_dump(stream_get_filters()); // lista os filtros

stream_filter_append($file, 'string.toupper'); // toupper, mas não converte caracteres multibyte

// registrando o filtro criado
stream_filter_register('filtro.parte', FiltroPartes::class);
// utilizando filtro
stream_filter_append($file, 'filtro.parte');

echo "Apenas cursos com 'parte' em uppercase:" . PHP_EOL;
echo fread($file, filesize('txt/lista-cursos.txt'));

fclose($file);
