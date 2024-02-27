<?php

namespace src\Model;

class Calculadora
{
	public function adicao(float $valorX, float $valorY): float
	{
		return round($valorX + $valorY, 2);
	}

	public function subtracao(float $valorX, float $valorY): float
	{
		return round($valorX - $valorY, 2);
	}

	public function multiplicacao(float $valorX, float $valorY): float
	{
		return round($valorX * $valorY, 2);
	}

	public function potenciacao(float $valorX, float $valorY): float
	{
		return round($valorX ** $valorY, 2);
	}

	public function divisao(float $valorX, float $valorY): float|string
	{
		if ($valorY == 0) return 'Indeterminação';

		return round($valorX / $valorY, 2);
	}

	public function modulo(float $valorX, float $valorY): float|string
	{
		if ($valorY == 0) return 'Indeterminação';

		return round($valorX % $valorY, 2);
	}
}
