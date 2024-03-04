<?php

namespace Curso\Banco\Model;

// classes final não podem ser extendidas
use Curso\Banco\Exception\CPFInvalidoException;

final class CPF
{
	public readonly string $cpf;

	public function __construct(string $cpf)
	{
		$this->cpf = $this->validaCpf($cpf);
	}

	public function getCpfFormatado(): string
	{
		return preg_replace('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '$1.$2.$3-$4', $this->cpf);
	}

	private function validaCpf(string $cpf): string
	{
		// validando tamanho e formato do CPF:
		if (!preg_match('/^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$/', $cpf))
			throw new CPFInvalidoException("O CPF inserido é inválido!");

		// removendo pontos e hífen:
		$cpf = str_replace(['.', '-'], '', $cpf);

		// validando se o CPF não é composto de números iguais:
		if (preg_match('/^(\d)\1{10}$/', $cpf))
			throw new CPFInvalidoException("O CPF inserido é inválido!");

		// primeiro verificador:
		$sum = 0;

		for ($i = 0; $i < 9; $i++)
			$sum += $cpf[$i] * (10 - $i);

		$rest = ($sum * 10) % 11;
		if ($rest == 10) $rest = 0;
		if ($rest != $cpf[9]) throw new CPFInvalidoException("O CPF inserido é inválido!");

		// segundo verificador:
		$sum = 0;

		for ($i = 0; $i < 10; $i++)
			$sum += $cpf[$i] * (11 - $i);

		$rest = ($sum * 10) % 11;
		if ($rest == 10) $rest = 0;
		if ($rest != $cpf[10]) throw new CPFInvalidoException("O CPF inserido é inválido!");

		return $cpf;
	}
}
