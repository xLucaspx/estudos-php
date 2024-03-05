<?php

namespace Xlucaspx\BuscadorCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorCursos {
	
	public function __construct(
		private ClientInterface $client
	) {}

	public function buscar(string $url): array
	{
		$res = $this->client->request("GET", $url);
		$html = $res->getBody();

		$crawler= new Crawler($html);

		$cursos = $crawler->filter("span.card-curso__nome");

		$lista = [];

		foreach ($cursos as $curso) $lista[] = $curso->textContent;

		return $lista;
	}
}
