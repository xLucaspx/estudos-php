<?php

namespace Curso\Banco\Model\Funcionario;

use Curso\Banco\Model\Autenticavel;

class Gerente extends Funcionario implements Autenticavel
{
	public function podeAutenticar($senha): bool
	{
		return $senha === '#senhaGerente01';
	}

	public function calculaBonificacao(): float
	{
		return $this->getSalario() * 0.5;
	}
}
