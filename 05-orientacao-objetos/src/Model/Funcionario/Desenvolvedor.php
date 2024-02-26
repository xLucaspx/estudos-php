<?php

namespace Curso\Banco\Model\Funcionario;

class Desenvolvedor extends Funcionario
{

	public function promove()
	{
		$this->aumentaSalario($this->getSalario() * 0.75);
	}

	public function calculaBonificacao(): float
	{
		return $this->getSalario() * 0.1;
	}
}
