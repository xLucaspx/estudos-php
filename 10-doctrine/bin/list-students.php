<?php

use Xlucaspx\CursoDoctrine\Entity\Course;
use Xlucaspx\CursoDoctrine\Entity\Phone;
use Xlucaspx\CursoDoctrine\Entity\Student;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

echo "Listando com findAll()\n\n";
/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

echo "{\n	\"alunos\": [" . PHP_EOL;
foreach ($studentList as $student) {
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
			},
	END. PHP_EOL;
}
echo "	]\n}" . PHP_EOL;

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

echo "Total de registros: " . $studentRepository->count() . PHP_EOL;
