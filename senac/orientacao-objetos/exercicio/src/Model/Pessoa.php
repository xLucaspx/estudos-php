<?php

namespace Senac\OO\Model;

abstract class Pessoa
{
	public readonly CPF $cpf;

	public function __construct(
		string $cpf,
		private string $nome,
		private int $idade
	)
	{
		$this->cpf = new CPF($cpf);
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function setNome(string $nome): void
	{
		$this->nome = $nome;
	}

	public function getIdade(): int
	{
		return $this->idade;
	}

	public function setIdade(int $idade): void
	{
		$this->idade = $idade;
	}

	public function getCpfFormatado(): string
	{
		return $this->cpf->getCpfFormatado();
	}
}
