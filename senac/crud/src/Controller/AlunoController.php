<?php

namespace Senac\Crud\Controller;

use Senac\Crud\Dao\AlunoDao;
use Senac\Crud\Model\Aluno\DetalhesAluno;
use Throwable;

class AlunoController
{
	private AlunoDao $dao;

	public function __construct()
	{
		$this->dao = new AlunoDao();
	}

	public function buscaTodos(): array|false
	{
		try {
			return $this->dao->buscaTodos();
		} catch (Throwable $e) {
			fputs(STDERR, "Erro inesperado ao buscar alunos: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
			return false;
		}
	}

	public function buscaPorId(int $id): DetalhesAluno|false
	{
		try {
			return $this->dao->buscaPorId($id);
		} catch (Throwable $e) {
			fputs(STDERR, "Erro inesperado ao buscar aluno: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
			return false;
		}
	}

	public function deleta(int $id): bool
	{
		try {
			return $this->dao->deleta($id);
		} catch (Throwable $e) {
			fputs(STDERR, "Erro inesperado ao deletar aluno: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
			return false;
		}
	}
}
