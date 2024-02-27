<?php

namespace Senac\OO\Model;

class Paciente extends Pessoa
{
	public function __construct(
		string $cpf,
		string $nome,
		int $idade,
		public readonly string $sintoma
	)
	{
		parent::__construct($cpf, $nome, $idade);
	}
}
