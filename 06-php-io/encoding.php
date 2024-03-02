<?php

require_once 'filtros/FiltroDecode.php';

$cursosArquivo1 = file('files/lista-cursos.txt');
$cursosArquivo2 = file('files/cursos-write.txt');

$csv = fopen('files/cursos-iso.csv', 'w+');

foreach ($cursosArquivo1 as $curso) {
	//$linha = [trim(utf8_decode($curso)), 1];
	// a função utf8_decode tira a string de UTF-8 e passa para ISO-8859-1, porém foi descontinuada...

	// alternativas são mb_convert_encoding, UConverter::transcode() ou iconv()
	// mb_convert_encoding(string, toEncoding, fromEncoding opcional)
	$linha = [trim(mb_convert_encoding($curso, 'ISO-8859-1')), 1];
	fputcsv($csv, $linha, separator: ';');
}

// iconv(fromEncoding, toEncoding, string)
fputcsv($csv, [iconv('utf-8', 'iso-8859-1', "Engenharia de Software com PHP"), 0], ";");
fputcsv($csv, [iconv('utf-8', 'iso-8859-1', "Ciência da Computação com PHP"), 0], ";");

foreach ($cursosArquivo2 as $curso) {
	// UConverter: necessário ativar extension=intl
	// UConverter::transcode(string, toEncoding, fromEncoding)
	$curso = trim(UConverter::transcode($curso, 'iso-8859-1', 'utf-8'));
	fputcsv($csv, [$curso, 2], ";");
}

// da mesma forma, podemos utilizar funções para encoding, basta ajustar os parâmetros.

// situações assim são exemplos perfeitos de quando é interessante usar filtros. Podemos criar um filtros
// para encode / decode, por exemplo, e utilizarmos para escrever ou ler arquivos sem que precisemos chamar
// as funções no arquivo original:

stream_filter_register('filtro.decode', FiltroDecode::class);
stream_filter_append($csv, 'filtro.decode');

rewind($csv);

echo fread($csv, filesize('files/cursos-iso.csv'));

fclose($csv);
