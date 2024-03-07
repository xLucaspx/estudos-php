<?php

namespace Senac\Crud\Controller;

use DomainException;
use Senac\Crud\Dao\AlunoDao;
use Senac\Crud\Model\Aluno\DadosAtualizacaoAluno;
use Senac\Crud\Model\Aluno\DadosCadastroAluno;
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
			throw new DomainException("Erro inesperado ao buscar alunos: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
		}
	}

	public function buscaPorId(int $id): DetalhesAluno|false
	{
		try {
			return $this->dao->buscaPorId($id);
		} catch (Throwable $e) {
			throw new DomainException("Erro inesperado ao buscar aluno: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
		}
	}

	public function cadastra(DadosCadastroAluno $dados): bool
	{
		try {
			return $this->dao->cadastra($dados);
		} catch (Throwable $e) {
			throw new DomainException("Erro inesperado ao cadastrar aluno: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
		}
	}

	public function atualiza(DadosAtualizacaoAluno $dados): bool
	{
		try {
			if (!$this->buscaPorId($dados->id)) throw new DomainException("Aluno não encontrado!");

			return $this->dao->atualiza($dados);
		} catch (Throwable $e) {
			throw new DomainException("Erro inesperado ao atualizar aluno: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
		}
	}

	public function deleta(int $id): bool
	{
		try {
			return $this->dao->deleta($id);
		} catch (Throwable $e) {
			throw new DomainException("Erro inesperado ao deletar aluno: {$e->getMessage()} em {$e->getFile()}:{$e->getLine()}");
		}
	}
}
