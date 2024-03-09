<?php

namespace Xlucaspx\PhpPdo\Domain\Model;

use DateTimeImmutable;

// classe no padrão Entity
class Student
{
	/** @var Phone[] */
	private array $phones = [];

	public function __construct(
		private ?int $id,
		private string $name,
		private \DateTimeInterface $birthDate
	) {}

	public function id(): ?int
	{
		return $this->id;
	}

	// public function defineId(int $id): void
	// {
	// 	if (!is_null($this->id))
	// 		throw new \DomainException("O ID só pode ser definido uma vez!");

	// 	$this->id = $id;
	// }

	public function name(): string
	{
		return $this->name;
	}

	public function changeName(string $newName): void
	{
		$this->name = $newName;
	}

	public function birthDate(): \DateTimeInterface
	{
		return $this->birthDate;
	}

	public function age(): int
	{
		return $this->birthDate()
			->diff(new DateTimeImmutable())
			->y;
	}

	public function addPhone(Phone $phone): void
	{
		$this->phones[] = $phone;
	}

	/** @return Phone[] */
	public function phones(): array
	{
		return $this->phones;
	}

	public function __toString(): string
	{
		return "Aluno { id: $this->id, nome: $this->name, idade: {$this->age()} anos }";
	}
}
