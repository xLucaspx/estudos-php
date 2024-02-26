<?php

namespace Curso\Banco\Model\Conta;

// para importar uma classe temos duas opções: utilizar o fully qualified name ou importar com `use`.
// diferentemente de include e require, o use precisa estar no início do arquivo
// para classes do mesmo namespace, podemos importar na mesma linha passando os nomes entre chaves ({}):
use Curso\Banco\Model\{Autenticavel, Pessoa, Endereco};

class Titular extends Pessoa implements Autenticavel
{
	// a partir do PHP 8 podemos utilizar a promoção de propriedades no construtor; com esta sintaxe,
	// reduzimos a quantidade de código digitado, pois não precisamos declarar, receber e atribuir; não podemos
	// ter a mesma propriedade fora do construtor e promovida no construtor (duplicate/cannot redeclare).
	// modificadores de visibilidade são a forma mais viável de aplicar property promotion, mas qualquer outro
	// single modifier (como readonly) terá o mesmo efeito
	public function __construct(
		string $cpf,
		string $nome,
		private Endereco $endereco
	)
	{
		parent::__construct($cpf, $nome);
	}

	public function podeAutenticar($senha): bool
	{
		return $senha === '#senhaTitular01';
	}

	public function getEndereco(): Endereco
	{
		return $this->endereco;
	}

	public function setEndereco(Endereco $endereco): void
	{
		$this->endereco = $endereco;
	}
}
