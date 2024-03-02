<?php

$cursosArquivo1 = file('files/lista-cursos.txt');
$cursosArquivo2 = file('files/cursos-write.txt');

$csv = fopen('files/cursos.csv', 'w+');

foreach ($cursosArquivo1 as $curso) {
	$linha = [trim($curso), 1];
	// fwrite($csv, implode(',', $linha));
	// a função fputcsv facilita a criação de arquivos .csv:
	fputcsv($csv, $linha, separator: ';');
}

fputcsv($csv, ["Engenharia de Software com PHP", 0], ";");
fputcsv($csv, ["Ciência da Computação com PHP", 0], ";");

foreach ($cursosArquivo2 as $curso) {
	$curso = trim($curso);
	fputcsv($csv, [$curso, 2], ";");
}

// movendo o cursor para o início do arquivo com fseek ou rewind:
// fseek($csv, 0);
rewind($csv);

// da mesma forma que fputcsv, existe fgetcsv para a leitura; esta função interpreta a
// linha em busca de campos no formato CSV e retorna um array contendo os campos lidos:
while (($line = fgetcsv($csv, separator: ';')) !== false) {
	echo "Curso: $line[0], Arquivo $line[1]" . PHP_EOL;
}

fclose($csv);
