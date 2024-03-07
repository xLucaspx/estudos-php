<?php

use Senac\Crud\Controller\AlunoController;
use Senac\Crud\Model\Aluno\DadosAtualizacaoAluno;
use Senac\Crud\Model\Aluno\DadosCadastroAluno;

require_once 'autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
	echo "Operação inválida!";
	exit();
}

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');

$controller = new AlunoController();

try {
	if ($id) {
		$dados = new DadosAtualizacaoAluno($id, $nome, $email);
		$controller->atualiza($dados);

		header("Location: views/lista-alunos.php");
		exit();
	}

	$cpf = filter_input(INPUT_POST, 'cpf');
	$dataNascimento = filter_input(INPUT_POST, 'dataNascimento');
	$matricula = filter_input(INPUT_POST, "matricula");

	$dados = new DadosCadastroAluno($nome, $email, $cpf, $matricula, $dataNascimento);
	$controller->cadastra($dados);

	header("Location: views/lista-alunos.php");
	exit();

} catch (Throwable $e) {
	echo $e->getMessage();
	exit();
}
