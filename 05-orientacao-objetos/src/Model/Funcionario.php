<?php

namespace Curso\Banco\Model;

class Funcionario extends Pessoa
{

	public function __construct(
		string $cpf,
		string $nome,
		private string $cargo
	)
	{
		parent::__construct($cpf, $nome);
	}

	public function getCargo(): string
	{
		return $this->cargo;
	}

	public function setCargo(string $cargo): void
	{
		$this->cargo = $cargo;
	}

	public function setaNome(string $nome): void
	{
		parent::setNome($nome);
	}
}
