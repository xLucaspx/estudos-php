<?php

namespace Xlucaspx\PhpPdo\Domain\Repository;

use Xlucaspx\PhpPdo\Domain\Model\Student;

// abstraimos a implementação do repository através de uma interface para podermos trocar a implementação no futuro, caso necessário
interface StudentRepository
{
	public function findAll(): array;

	public function findAllByBithDate(\DateTimeInterface $birthDate): array;

	public function save(Student $student): bool;

	public function remove(Student $student): bool;
}
