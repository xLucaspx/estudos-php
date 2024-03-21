<?php

use Doctrine\ORM\Mapping\{
	Column,
	Entity,
	GeneratedValue,
	Id
};

#[Entity]
class Student
{
	#[Column] #[Id] #[GeneratedValue]
	public readonly int $id;

	public function __construct(
		#[Column(length: 50)]
		public readonly string $name
	) {}
}
