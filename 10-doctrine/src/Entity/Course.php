<?php

namespace Xlucaspx\CursoDoctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'course')]
class Course
{
	#[Column, Id, GeneratedValue]
	private int $id;

	#[ManyToMany(targetEntity: Student::class, mappedBy: 'courses')]
	private Collection $students;

	public function __construct(
		#[Column(length: 25)]
		public readonly string $name
	)
	{
		$this->students = new ArrayCollection();
	}

	public function addStudent(Student $student)
	{
		if ($this->students->contains($student)) {
			return;
		}

		$this->students->add($student);
		$student->enrolInCourse($this);
	}

	/**
	 * @return Collection<Student>
	 */
	public function students(): Collection
	{
		return $this->students;
	}
}
