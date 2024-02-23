<?php

class Titular
{
	// a partir do PHP 8 podemos utilizar a promoção de propriedades no construtor; com esta sintaxe,
	// reduzimos a quantidade de código digitado, pois não precisamos declarar, receber e atribuir; não podemos
	// ter a mesma propriedade fora do construtor e promovida no construtor (duplicate/cannot redeclare).
	// modificadores de visibilidade são a forma mais viável de aplicar property promotion, mas qualquer outro
	// single modifier (como readonly) terá o mesmo efeito
	public function __construct(
		public readonly string $cpf,
		public readonly string $nome,
	) {
		$this->validaNome($nome);
	}

	private function validaNome(string $nome): void
	{
		if (mb_strlen($nome) < 5)
			throw new Exception("O nome do titular deve ter mais de 5 caracteres!");
	}
}
