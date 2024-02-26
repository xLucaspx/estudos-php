<?php

namespace Curso\Banco\Model;

use Curso\Banco\Service\AcessoPropriedades;

/**
 * @property string $logradouro
 * @property string $bairro
 * @property string $numero
 * @property string $cidade
 * @property string $uf
 */
final class Endereco
{

	// dentro da classe, a palavra `use` serve para indicar o uso de uma trait por baixo dos panos,
	// é como se o PHP substituísse a linha onde estamos dando use pelo código da trait;
	// podemos utilizar quantas traits quisermos
	use AcessoPropriedades;

	public function __construct(
		private string $logradouro,
		private string $bairro,
		private string $numero,
		private string $cidade,
		private string $uf
	) {}

	public function getLogradouro(): string
	{
		return $this->logradouro;
	}

	public function getBairro(): string
	{
		return $this->bairro;
	}

	public function getNumero(): string
	{
		return $this->numero;
	}

	public function getCidade(): string
	{
		return $this->cidade;
	}

	public function getUf(): string
	{
		return $this->uf;
	}

	public function __toString(): string
	{
		return "$this->logradouro, Nº $this->numero, bairro $this->bairro, $this->cidade - $this->uf";
	}
}
