<?php
// com a função fopen (file open) podemos abrir um arquivo para ler, escrever ou realizar qualquer tipo de manipulação
// o primeiro parâmetro é o nome do arquivo, o segundo o modo (neste caso, 'r' de read); retorna um "ponteiro"/"referência" para o arquivo
$file = fopen('files/lista-cursos.txt', 'r');

// a função feof (file end of file) verifica se o arquivo já chegou no fim
while (!feof($file)) {
	// a função fgets lê a linha do arquivo até a quebra, posicionando o cursor no início da próxima linha;
	// se não quiser a linha inteira, é possível passar o parâmetro length
	$line = fgets($file);
	echo $line;
}

// fechando o arquivo
fclose($file);
