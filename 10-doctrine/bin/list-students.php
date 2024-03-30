<?php

use Xlucaspx\CursoDoctrine\Entity\Course;
use Xlucaspx\CursoDoctrine\Entity\Phone;
use Xlucaspx\CursoDoctrine\Entity\Student;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;
use Xlucaspx\CursoDoctrine\Repository\DoctrineStudentRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentClass = Student::class;

/** @var DoctrineStudentRepository $studentRepository */
$studentRepository = $entityManager->getRepository($studentClass);

$studentList = $studentRepository->studentsWithCourses();

echo "{\n	\"alunos\": [" . PHP_EOL;

$listSize = count($studentList);
for ($i = 0; $i < $listSize; $i++) {
	$student = $studentList[$i];
	$id = $student->id();
	$name = $student->name();
	$phones = null;
	$courses = null;


	if ($student->phones()->count() > 0) {
		$phones = implode(", ", $student->phones()->map(fn(Phone $phone) => "\"$phone->number\"")->toArray());
	}

	if ($student->courses()->count() > 0) {
		$courses = implode(", ", $student->courses()->map(fn(Course $course) => "\"$course->name\"")->toArray());
	}

	echo <<<END
			{
				"id": $id,
				"nome": "$name",
				"fones": [$phones],
				"cursos": [$courses]
			}
	END;

	echo $i == $listSize - 1 ? '' : ',';
	echo PHP_EOL;
}

$total = count($studentList);
echo "	],\n	\"total\": $total\n}" . PHP_EOL;

// utilizando o studentRepository:
// buscando com findAll()
$studentList = $studentRepository->findAll();

// buscando com find(), recebe o id e retorna o objeto
$student = $studentRepository->find(1);

// buscando por nome com findBy(), retorna um array
$findByName = $studentRepository->findBy([
	'name' => 'Fulano de Tal'
]);

// buscando por nome com findOneBy(), retorna um objeto
$fulano = $studentRepository->findOneBy([
	'name' => 'Fulano de Tal'
]);

// total de registros com count (count(*))
$total = $studentRepository->count();

// total de registros com DQL (count(id))
$entityManager
	->createQuery("SELECT COUNT(student) FROM $studentClass student")
	->getSingleScalarResult();
