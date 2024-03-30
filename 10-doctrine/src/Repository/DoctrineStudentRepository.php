<?php

namespace Xlucaspx\CursoDoctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Xlucaspx\CursoDoctrine\Entity\Student;

// repositórios do Doctrine ORM precisam estender a classe Doctrine\ORM\EntityRepository
class DoctrineStudentRepository extends EntityRepository
{
	private string $studentClass = Student::class;

	/** @return Student[] */
	public function studentsWithCourses(): array
	{
		// utilizando query builder:
		// return $this->createQueryBuilder('student')
		// 	->addSelect('phone')
		// 	->addSelect('course')
		// 	->leftJoin('student.phones', 'phone')
		// 	->leftJoin('student.courses', 'course')
		// 	->getQuery()
		// 	->getResult();

		// utilizando DQL (Doctrine Query Language):
		// $dql = "SELECT student FROM Xlucaspx\CursoDoctrine\Entity\Student student";
		$dql = <<<END
			SELECT
				student, phone, course
			FROM $this->studentClass student
				LEFT JOIN student.phones phone
				LEFT JOIN student.courses course
		END;

		return $this->getEntityManager()->createQuery($dql)->getResult();
	}
}
