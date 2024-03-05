<?php

namespace Senac\Crud\Model;

class Email
{

	public function __construct(
		public readonly string $email
	) {
		$this->validaEmail($email);
	}

	private function validaEmail(string $email): void
	{
		if (!preg_match('/^\w+([\.\-]?\w+)*@\w+([\.\-]?\w+)*(\.\w{2,3})+$/i', $email))
			throw new \DomainException("O endereço de e-mail inserido não está em um formato válido!");
	}

	public function __toString(): string
	{
		return $this->email;
	}
}
