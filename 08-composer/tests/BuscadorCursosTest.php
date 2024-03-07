<?php


use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Xlucaspx\BuscadorCursos\BuscadorCursos;

class BuscadorCursosTest extends TestCase
{

	private $httpClientMock;
	private string $url = 'url-teste';

	protected function setUp(): void
	{
		$html = <<<END
		<html lang="pt-br">
			<body>
				<span class="card-curso__nome">Curso Teste 1</span>
				<span class="card-curso__nome">Curso Teste 2</span>
				<span class="card-curso__nome">Curso Teste 3</span>
			</body>
		</html>
		END;

		$stream = $this->createMock(StreamInterface::class);
		$stream
			->expects($this->once())
			->method('__toString')
			->willReturn($html);

		$res = $this->createMock(ResponseInterface::class);
		$res
			->expects($this->once())
			->method('getBody')
			->willReturn($stream);

		$httpClient = $this->createMock(ClientInterface::class);
		$httpClient
			->expects($this->once())
			->method('request')
			->with("GET", $this->url)
			->willReturn($res);

		$this->httpClientMock = $httpClient;
	}

	public function testDeveRetornarCursos()
	{
		$buscador = new BuscadorCursos($this->httpClientMock);
		$cursos = $buscador->buscar($this->url);

		$this->assertCount(3, $cursos);
		$this->assertEquals('Curso Teste 1', $cursos[0]);
		$this->assertEquals('Curso Teste 2', $cursos[1]);
		$this->assertEquals('Curso Teste 3', $cursos[2]);
	}
}
