<?php

namespace Senac\Crud\Model;

use DateTime;

class Aluno
{
public function __construct(
	private string $nome,
	private Email $email,
	public readonly CPF $cpf,
	public readonly string $matricula,
	public readonly DateTime $dataNascimento
) {}
}
