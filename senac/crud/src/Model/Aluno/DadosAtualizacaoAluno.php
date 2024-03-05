<?php

namespace Senac\Crud\Model\Aluno;

use Senac\Crud\Model\CPF;
use Senac\Crud\Model\Email;

class DadosAtualizacaoAluno
{
	public readonly Email $email;

	public function __construct(
		public readonly int $id,
		public readonly string $nome,
		string $email
	)
	{
		$this->validaNome($nome);
		$this->email = new Email($email);
	}

	private function validaNome(string $nome): void
	{
		if (mb_strlen($nome) < 5) throw new \DomainException("O nome deve ter, no mínimo, 5 caracteres!");
		if (mb_strlen($nome) > 50) throw new \DomainException("O nome pode ter, no máximo, 50 caracteres!");
	}
}
