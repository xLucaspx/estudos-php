<?php

namespace Curso\Banco\Service;

// traits servem para reutilizar código; dentro de uma classe, podemos indicar que queremos utilizar uma
// trait com a palavra `use`; por baixo dos panos, é como se o PHP colasse o código da trait dentro da classe.
// pode-se utilizar quantas traits quiser em uma classe.
trait AcessoPropriedades
{
	// o método mágico __get échamado sempre que ocorre uma tentativa de acessar
	// um atributo ao qual não se tem acesso (privado ou que não existe)
	public function __get(string $name)
	{
		// gambiarra?
		$method = 'get' . ucfirst($name); // upper case first letter
		return $this->$method();
	}

	// seguindo a mesma lógica existe o método __set
	public function __set(string $name, $value): void
	{
		$this->$name = $value;
	}
}
