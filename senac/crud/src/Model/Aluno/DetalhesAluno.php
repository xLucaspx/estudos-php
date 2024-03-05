<?php

namespace Senac\Crud\Model\Aluno;

use Senac\Crud\Model\CPF;
use Senac\Crud\Model\Email;

class DetalhesAluno
{
	public readonly CPF $cpf;
	public readonly Email $email;
	public readonly \DateTime $dataNascimento;

	public function __construct(
		public readonly int $id,
		public readonly string $nome,
		string $email,
		string $cpf,
		public readonly string $matricula,
		string $dataNascimento
	)
	{
		$this->cpf = new CPF($cpf);
		$this->email = new Email($email);
		$this->dataNascimento = new \DateTime($dataNascimento . 'T00:00:00-03:00');
	}
}
