<?php

namespace Curso\Banco\Service;

use Curso\Banco\Model\Autenticavel;

class Autenticador
{
	public function autentica(Autenticavel $autenticavel, string $senha): void
	{
		echo ($autenticavel->podeAutenticar($senha) ? 'Usuário logado!' : 'Senha incorreta!') . PHP_EOL;
	}
}
