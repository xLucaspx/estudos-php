<?php

namespace Senac\Crud\Model\Aluno;

use Senac\Crud\Model\CPF;
use Senac\Crud\Model\Email;

class Aluno
{
	public readonly int $id;
	private string $nome;
	private Email $email;
	private CPF $cpf;
	public readonly string $matricula;
	public readonly \DateTime $dataNascimento;


	public function __construct(DetalhesAluno $dados)
	{
		$this->id = $dados->id;
		$this->nome = $dados->nome;
		$this->cpf = $dados->cpf;
		$this->email = $dados->email;
		$this->matricula = $dados->matricula;
		$this->dataNascimento = $dados->dataNascimento;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function setNome(string $nome): void
	{
		$this->nome = $nome;
	}

	/**
	 * @return string retorna o e-mail como string
	 */
	public function getEmail(): string
	{
		return $this->email->email;
	}

	public function setEmail(string $email): void
	{
		$this->email = new Email($email);
	}

	/**
	 * @return string retorna o cpf formatado como uma string
	 */
	public function getCpf(): string
	{
		return $this->cpf->getCpfFormatado();
	}
}
