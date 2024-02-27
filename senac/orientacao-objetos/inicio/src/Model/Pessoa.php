<?php

namespace src\Model;

class Pessoa
{
	public function __construct(
		public readonly string $nome,
		public readonly int $idade
	) {}

	public function __toString(): string
	{
		return "{$this->nome}, {$this->idade} anos";
	}
}
