<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$res = $client->request("GET", "https://httpbin.org/get");
$body = $res->getBody()->getContents();

// var_dump($body);

$res = $client->request("GET", "https://www.alura.com.br/cursos-online-programacao/php");
// $html = $res->getBody()->getContents();
$html = $res->getBody();

// var_dump($html);

$crawler = new Crawler($html);
$cursos = $crawler->filter("span.card-curso__nome");

foreach ($cursos as $curso) {
	echo $curso->textContent . PHP_EOL;
}
