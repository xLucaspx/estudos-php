<?php

namespace Curso\Banco\Model\Conta;

class ContaPoupanca extends Conta
{
	protected function percentualTarifa(): float
	{
		return 0.03;
	}

	public function __toString(): string
	{
		return 'Conta Poupança' . PHP_EOL . parent::__toString();
	}
}
