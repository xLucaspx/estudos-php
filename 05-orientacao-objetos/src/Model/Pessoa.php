<?php

namespace Curso\Banco\Model;

abstract class Pessoa
{
	private CPF $cpf;
	protected string $nome;

	public function __construct(string $cpf, string $nome)
	{
		$this->cpf = new CPF($cpf);
		$this->setNome($nome);
	}

	public function getCpf(): string
	{
		return $this->cpf->getCpfFormatado();
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	protected function setNome(string $nome): void
	{
		$this->validaNome($nome);
		$this->nome = $nome;
	}

	// métodos final não podem ser sobrescritos
	protected final function validaNome(string $nome): void
	{
		if (mb_strlen($nome) < 5)
			throw new Exception("O nome deve ter mais de 5 caracteres!");
	}
}
