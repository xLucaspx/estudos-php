<?php

namespace Senac\Crud\Model\Aluno;

use Senac\Crud\Model\CPF;
use Senac\Crud\Model\Email;

class DadosCadastroAluno
{
	public readonly CPF $cpf;
	public readonly Email $email;
	public readonly \DateTime $dataNascimento;

	public function __construct(
		public readonly string $nome,
		string $email,
		string $cpf,
		public readonly string $matricula,
		int $diaNascimento,
		int $mesNacimento,
		int $anoNascimento
	)
	{
		$this->validaNome($nome);
		$this->email = new Email($email);
		$this->cpf = new CPF($cpf);
		$this->validaMatricula($this->matricula);
		$this->setDataNascimento($diaNascimento, $mesNacimento, $anoNascimento);
	}

	public function setDataNascimento(int $dia, int $mes, int $ano): void
	{
		$anoMinimo = 1920;
		$anoMaximo = date('Y') - 16;
		if ($ano < $anoMinimo || $ano > $anoMaximo) throw new \DomainException("O ano de nascimento inserido é inválido! Deve estar entre $anoMinimo e $anoMaximo; valor inserido: $ano");

		if ($mes < 1 || $mes > 12) throw new \DomainException("Valor inválido inserido para o mês de nascimento! Valor inserido: $mes");

		if ($dia < 1) throw new \DomainException("Valor inválido inserido para o dia! Valor inserido: $dia");

		$diaValido = match ($mes) {
			1, 3, 5, 7, 8, 10, 12 => $dia <= 31,
			4, 6, 9, 11 => $dia <= 30,
			// date('L') retorna 1 se o ano for bissexto ou 0 caso contrário
			2 => (date('L', mktime(0, 0, 0, $mes, $dia, $ano)) == 1) ? $dia <= 29 : $dia <= 28
		};

		if (!$diaValido) throw new \DomainException("A data de nascimento inserida ($dia/$mes/$ano) é inválida!");

		// $data = new \DateTime(timezone: new DateTimeZone('America/Sao_Paulo'));
		// $data->setDate($ano, $mes, $dia);
		$this->dataNascimento = new \DateTime("$ano-$mes-$dia" . 'T00:00:00-03:00');
	}

	private function validaNome(string $nome): void
	{
		if (mb_strlen($nome) < 5) throw new \DomainException("O nome deve ter, no mínimo, 5 caracteres!");
		if (mb_strlen($nome) > 50) throw new \DomainException("O nome pode ter, no máximo, 50 caracteres!");
	}

	private function validaMatricula(string $matricula): void
	{
		if (!preg_match('/\d{8}/', $matricula)) throw new \DomainException("A matricula deve ser composta de 8 dígitos!");
	}
}
