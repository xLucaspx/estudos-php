<?php

// criando uma instância da classe Directory com a função dir; passando '.' pois queremos o diretório atual:
$diretorioAtual = dir('.');

// podemos exibir o caminho do diretório atual:
echo "Diretório atual: $diretorioAtual->path" . PHP_EOL;

// enquanto for possível ler do diretório atual, ou seja, enquanto houver arquivos, continua no loop;
// read() retorna uma string com o conteúdo lido ou false:
while ($file = $diretorioAtual->read()) {
	echo $file . PHP_EOL;
}

echo PHP_EOL;
// da mesma forma, para trabalhar com arquivos, podemos criar um SplFileObject; estas classes nos ajudam a
// trabalhar com arquivos (ou streams em geral) utilizando uma API orientada a objetos.
$cursosCsv = new SplFileObject('files/cursos.csv'); // o modo de leitura 'r' é o padrão

//while (!$cursosCsv->eof()) {
//	$line = $cursosCsv->fgetcsv(';');
//
//	if (in_array(null, $line)) continue;
//
//	echo "Curso: $line[0], Arquivo $line[1]" . PHP_EOL;
//}

// a classe SplFileObject implementa algumas interfaces de Iterators do PHP, o que significa que podemos
// utilizar um objeto deste tipo dentro de um foreach:
foreach ($cursosCsv as $line) {
	$line = str_getcsv($line, ';');

	if (in_array(null, $line)) continue;

	echo "Curso: $line[0], Arquivo $line[1]" . PHP_EOL;
}

// como a classe SplFileObject herda de SplFileInfo podemos obter informações dos arquivos; SPL significa Standard PHP Library,
// que é uma coleção de classes interfaces criadas com o propósito de resolver problemas comuns.
$modifiedTime = new DateTime(timezone: new DateTimeZone('America/Sao_Paulo'));
$modifiedTime->setTimestamp($cursosCsv->getMTime());
$fileName = $cursosCsv->getFilename();
$fileSize = $cursosCsv->getSize();

echo "O arquivo $fileName possui $fileSize bytes e foi modificado pela última vez em {$modifiedTime->format('d/m/Y H:i:s')}";
