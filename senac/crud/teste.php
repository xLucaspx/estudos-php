<?php

require_once 'autoload.php';

use Senac\Crud\Dao\AlunoDao;
use Senac\Crud\Model\Aluno\DadosAtualizacaoAluno;
use Senac\Crud\Model\Aluno\DadosCadastroAluno;

$dao = new AlunoDao();

$aluno = new DadosCadastroAluno("Fulano de Tal", 'fulano@senac.com', '15263748973', '09871234', 29, 02, 2000);

//var_dump($dao->cadastra($aluno));

var_dump($dao->buscaTodos());

var_dump($dao->atualiza(new DadosAtualizacaoAluno(9, 'Pafúncio Pereira', 'pafuncio@email.com.br')));

$aluno = $dao->buscaPorId('12340987');

var_dump($aluno);
