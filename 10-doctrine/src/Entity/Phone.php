<?php

namespace Xlucaspx\CursoDoctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'phone')]
class Phone
{
	// podemos agrupar os atributos da seguinte maneira:
	#[Column, Id, GeneratedValue]
	private int $id;

	// targetEntity é obrigatório e inversedBy é opcional, mas é recomendado utilizar
	#[ManyToOne(targetEntity: Student::class, inversedBy: 'phones')]
	public readonly Student $student;

	public function __construct(
		#[Column(length: 15)]
		public readonly string $number
	) {}

	public function setStudent(Student $student): void
	{
		$this->student = $student;
	}
}
