<?php

namespace Curso\Banco\Model\Conta;

class ContaCorrente extends Conta
{
	protected function percentualTarifa(): float
	{
		return 0.05;
	}

	public function transfere(float $valor, Conta $destino): void
	{
		if ($valor <= 0)
			throw new Exception("O valor inserido para a transferência é inválido!");
		if ($valor > $this->getSaldo())
			throw new Exception("Saldo insuficiente para realizar a operação!");

		$this->saca($valor);
		$destino->deposita($valor);
	}

	public function __toString(): string
	{
		return 'Conta Corrente' . PHP_EOL . parent::__toString();
	}
}
