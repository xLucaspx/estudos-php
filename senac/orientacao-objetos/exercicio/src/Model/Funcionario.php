<?php

namespace Senac\OO\Model;

class Funcionario extends Pessoa
{

	public function __construct(
		string $cpf,
		string $nome,
		int $idade,
		private string $cargo,
		private float $salario
	)
	{
		parent::__construct($cpf, $nome, $idade);
	}

	public function calculaBonificacao(): float
	{
		return $this->salario * 0.05;
	}

	public function getSalario(): float
	{
		return $this->salario;
	}

	public function aumentaSalario(float $valorAumento): void
	{
		if ($valorAumento <= 0)
			throw new Exception("O valor do aumento de salário deve ser maior do que 0!");

		$total = $this->salario + $valorAumento;
		$this->setSalario($total);
	}

	private function setSalario(float $salario): void
	{
		$this->salario = $salario;
	}

	public function getCargo(): string
	{
		return $this->cargo;
	}

	public function setCargo(string $cargo): void
	{
		$this->cargo = $cargo;
	}
}
