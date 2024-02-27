<?php

namespace Senac\OO\Model;

class Medico extends Pessoa
{
	public function __construct(
		string $cpf,
		string $nome,
		int $idade,
		public readonly string $crm,
		public readonly string $especialidade)
	{
		parent::__construct($cpf, $nome, $idade);
	}
}
