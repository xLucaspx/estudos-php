<?php

namespace Curso\Banco\Service;

use Curso\Banco\Model\Funcionario\Funcionario;

class ControladorBonificacao
{
	private float $totalBonificacoes = 0;

	public function adicionaBonificacao(Funcionario $funcionario): void
	{
		$this->totalBonificacoes += $funcionario->calculaBonificacao();
	}

	public function getTotalBonificacoes(): float
	{
		return $this->totalBonificacoes;
	}
}
