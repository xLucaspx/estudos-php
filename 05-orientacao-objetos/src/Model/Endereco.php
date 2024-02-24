<?php

namespace Curso\Banco\Model;

class Endereco
{
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
}
