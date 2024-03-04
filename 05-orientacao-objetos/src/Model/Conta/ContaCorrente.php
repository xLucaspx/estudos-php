<?php

namespace Curso\Banco\Model\Conta;

use Curso\Banco\Exception\SaldoInsuficienteException;

class ContaCorrente extends Conta
{
	protected function percentualTarifa(): float
	{
		return 0.05;
	}

	public function transfere(float $valor, Conta $destino): void
	{
		if ($valor <= 0)
			throw new \InvalidArgumentException("O valor inserido para a transferência é inválido!");

		$this->saca($valor); // o método saca lança exception se valor > saldo
		$destino->deposita($valor);
	}

	public function __toString(): string
	{
		return 'Conta Corrente' . PHP_EOL . parent::__toString();
	}
}
