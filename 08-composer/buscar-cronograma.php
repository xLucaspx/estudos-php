<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Cronograma
{
	public function __construct(
		public readonly string $nroAula,
		public readonly string $diaSemana,
		public readonly string $strData,
		public readonly string $horario,
		public readonly string $descricao,
		public readonly string $atividade,
		public readonly string $recursos
	) {}

	public function __toString(): string
	{
		return "| $this->nroAula | $this->diaSemana | $this->strData | $this->horario | $this->descricao | $this->atividade | $this->recursos |";
	}
}

function filtra(Crawler $crawler, string $selector): array
{
	$res = $crawler
		->filter($selector)
		->each(function ($node) {
			return $node->text();
		});

	$lista = [];
	for ($i = 0; $i < sizeof($res); $i += 7) {
//		echo "{$res[$i]}, {$res[$i + 1]}, {$res[$i + 2]}, {$res[$i + 3]}, {$res[$i + 4]}, {$res[$i + 5]}, {$res[$i + 6]}" . PHP_EOL;
		$lista[] = new Cronograma(
			$res[$i],
			$res[$i + 1],
			$res[$i + 2],
			$res[$i + 3],
			$res[$i + 4],
			$res[$i + 5],
			$res[$i + 6]
		);
	}

	return $lista;
}

$client = new Client();
$res = $client->request("GET", "https://sarc.pucrs.br/Default/Export.aspx?id=217febff-bdf2-4928-9135-fa0429ebce0d&ano=2024&sem=1");

$crawler = new Crawler($res->getBody());

$cronograma = filtra($crawler, 'td>span');

foreach ($cronograma as $x) echo $x . PHP_EOL;
