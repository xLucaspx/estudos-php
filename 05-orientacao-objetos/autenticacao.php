<?php

use Curso\Banco\Model\Conta\Titular;
use Curso\Banco\Model\Endereco;
use Curso\Banco\Model\Funcionario\Diretor;
use Curso\Banco\Model\Funcionario\Gerente;
use Curso\Banco\Service\Autenticador;

require_once 'autoload.php';

$autenticador = new Autenticador();

$titular = new Titular(
	'12345678909',
	'Rodolfo da Silveira',
	new Endereco('Avenida Oswaldo Aranha', 'Bom Fim', '128', 'Porto Alegre', 'RS'));
$gerente = new Gerente('33455678068', 'Andreia da Rocha', 3750);
$diretor = new Diretor('32108058060', 'Eduardo Martins', 4125.90);

$autenticador->autentica($titular, '1234');
$autenticador->autentica($titular, '#senhaTitular01');

$autenticador->autentica($gerente, 'abcd');
$autenticador->autentica($gerente, '#senhaGerente01');

$autenticador->autentica($diretor, '4321');
$autenticador->autentica($diretor, '#senhaDiretor01');
