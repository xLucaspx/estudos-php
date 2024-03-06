<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use Xlucaspx\BuscadorCursos\BuscadorCursos;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$buscador = new BuscadorCursos($client);

$cursosPhp = $buscador->buscar('cursos-online-programacao/php');
//$cursosJava = $buscador->buscar('cursos-online-programacao/java');

echo "Cursos PHP" . PHP_EOL;
foreach ($cursosPhp as $curso) {
	echo $curso . PHP_EOL;
}


//echo "\nCursos Java" . PHP_EOL;
//foreach ($cursosJava as $curso) {
//	echo $curso . PHP_EOL;
//}
