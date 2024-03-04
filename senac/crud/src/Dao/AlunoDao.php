<?php

namespace Senac\Crud\Dao;

use Senac\Crud\Connection\Connection;

class AlunoDao
{
	private \PDO $con;

	public function __construct()
	{
		$this->con = Connection::getConnection();
	}

	public function cadastra($aluno): bool
	{
		$sql = "INSERT INTO aluno (nome, cpf, email, matricula, data_nascimento) VALUES (:nome, :cpf, :email, :matricula, :dh_nascimento)";
		$ps = $this->con->prepare($sql, [
			'nome' => $aluno->getNome(),
			'cpf' => $aluno->getCpf(),
			'email' => $aluno->getEmail(),
			'matricula' => $aluno->getMatricula(),
			'data_nascimento' => $aluno->getDataNascimento()
		]);

		return $ps->execute();
	}
}
