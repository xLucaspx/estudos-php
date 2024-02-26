<?php

namespace Curso\Banco\Model\Funcionario;

use Curso\Banco\Model\Autenticavel;

class Diretor extends Funcionario implements Autenticavel
{

	public function podeAutenticar($senha): bool
	{
		return $senha === '#senhaDiretor01';
	}

	public function calculaBonificacao(): float
	{
		return $this->getSalario();
	}
}
