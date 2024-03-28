<?php

namespace Xlucaspx\CursoDoctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\{Column, Entity, GeneratedValue, Id, ManyToMany, OneToMany, Table};

#[Entity]
#[Table(name: 'student')]
class Student
{
	#[Column] #[Id] #[GeneratedValue]
	private int $id;
	// id não pode ser readonly pois o doctrine faz o unset ao remover
	// public readonly int $id; // ao tentar remover: PHP Fatal error:  Uncaught LogicException: Attempting to change readonly property

	// targetEntity e mappedBy são obrigatórios
	#[OneToMany(targetEntity: Phone::class, mappedBy: 'student', cascade: ["persist", "remove"])]
	// private iterable $phones; // podemos manter como iterable ou utilizar diretamente as collections do doctrine
	private Collection $phones; // as collections também não podem ser readonly pois são modificadas internamente pelo próprio Doctrine

	#[ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
	private Collection $courses;

	public function __construct(
		#[Column(length: 50)]
		private string $name
	)
	{
		// todos os mapeamentos toMany devem ser inicializados como uma coleção do Doctrine
		$this->phones = new ArrayCollection();
		$this->courses = new ArrayCollection();
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function addPhone(Phone $phone): void
	{
		$this->phones->add($phone);
		$phone->setStudent($this);
	}

	public function enrolInCourse(Course $course)
	{
		if ($this->courses->contains($course)) {
			return;
		}

		$this->courses->add($course);
		$course->addStudent($this);
	}

	public function id(): int
	{
		return $this->id;
	}

	public function name(): string
	{
		return $this->name;
	}

	/** @return Collection<Phone> */
	public function phones(): Collection
	{
		return $this->phones;
	}

	/** @return Collection<Course> */
	public function courses(): Collection
	{
		return $this->courses;
	}
}
