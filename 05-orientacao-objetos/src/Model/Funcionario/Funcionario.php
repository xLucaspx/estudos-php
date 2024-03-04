<?php

namespace Curso\Banco\Model\Funcionario;

use Curso\Banco\Model\Pessoa;

abstract class Funcionario extends Pessoa
{

	public function __construct(
		string $cpf,
		string $nome,
		private float $salario
	)
	{
		parent::__construct($cpf, $nome);
	}

	public abstract function calculaBonificacao(): float;

	public function getSalario(): float
	{
		return $this->salario;
	}

	public function aumentaSalario(float $valorAumento): void
	{
		if ($valorAumento <= 0)
			throw new \InvalidArgumentException("O valor do aumento de salário deve ser maior do que 0!");

		$total = $this->salario + $valorAumento;
		$this->setSalario($total);
	}

	private function setSalario(float $salario): void
	{
		$this->salario = $salario;
	}

	public function setNome(string $nome): void
	{
		parent::setNome($nome);
	}
}
