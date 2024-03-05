<?php

namespace Senac\Crud\Dao;

use PDO;
use Senac\Crud\Connection\Connection;
use Senac\Crud\Model\Aluno\DadosAtualizacaoAluno;
use Senac\Crud\Model\Aluno\DadosCadastroAluno;
use Senac\Crud\Model\Aluno\DetalhesAluno;

class AlunoDao
{
	private \PDO $con;

	public function __construct()
	{
		$this->con = Connection::getConnection();
	}

	public function cadastra(DadosCadastroAluno $dados): bool
	{
		$sql = "INSERT INTO aluno (nome, cpf, email, matricula, data_nascimento) VALUES (:nome, :cpf, :email, :matricula, :data_nascimento)";
		$ps = $this->con->prepare($sql);

		return $ps->execute([
			'nome' => $dados->nome,
			'cpf' => $dados->cpf,
			'email' => $dados->email,
			'matricula' => $dados->matricula,
			'data_nascimento' => $dados->dataNascimento->format('Y-m-d')
		]);
	}

	public function atualiza(DadosAtualizacaoAluno $dados): bool
	{
		$sql = "UPDATE aluno SET nome = :nome, email = :email WHERE id = :id";
		$ps = $this->con->prepare($sql);

		return $ps->execute([
			'nome' => $dados->nome,
			'email' => $dados->email,
			'id' => $dados->id
		]);
	}

	public function buscaTodos(): array
	{
		$sql = "SELECT id, nome, cpf, email, matricula, data_nascimento FROM aluno";
		$query = $this->con->query($sql);

		$dados = $query->fetchAll(\PDO::FETCH_ASSOC);
		$lista = [];
		foreach ($dados as $dado) {
			['id' => $id, 'nome' => $nome, 'cpf' => $cpf, 'matricula' => $matricula, 'email' => $email, 'data_nascimento' => $dataNascimento] = $dado;

			$lista[] = new DetalhesAluno($id, $nome, $email, $cpf, $matricula, $dataNascimento);
		}

		return $lista;
	}

	/**
	 * @param string $matricula a matrícula do aluno buscado
	 * @return DetalhesAluno|false retorna os detalhes do aluno ou falso caso não encontrar a matrícula informa
	 */
	public function buscaPorMatricula(string $matricula): DetalhesAluno|false
	{
		$sql = "SELECT id, nome, cpf, email, matricula, data_nascimento FROM aluno WHERE matricula = :matricula";

		$ps = $this->con->prepare($sql);
		$ps->execute(['matricula' => $matricula]);

		$res = $ps->fetch(PDO::FETCH_ASSOC);

		if (!$res) return false;

		return new DetalhesAluno($res['id'], $res['nome'], $res['email'], $res['cpf'], $res['matricula'], $res['data_nascimento']);
	}
}
