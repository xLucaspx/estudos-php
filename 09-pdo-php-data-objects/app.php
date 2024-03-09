<?php

use Xlucaspx\PhpPdo\Domain\Model\Student;
use Xlucaspx\PhpPdo\Infrastructure\Persistence\ConnectionFactory;
use Xlucaspx\PhpPdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionFactory::createConnection();
$repository = new PdoStudentRepository($connection);

$class = [
	new Student(null, 'Lucas da Silva', new \DateTimeImmutable('1992-03-21')),
	new Student(null, 'Bernardo Rocha', new \DateTimeImmutable('1993-05-20')),
	new Student(null, 'Danielle Almeida', new \DateTimeImmutable('1995-01-11')),
	new Student(null, 'Samuel Echer', new \DateTimeImmutable('1990-03-31')),
	new Student(null, 'Régis Ortiz', new \DateTimeImmutable('1998-08-02')),
	new Student(null, 'Maria Regina Lima', new \DateTimeImmutable('1997-10-29')),
	new Student(null, 'Carlos Dias', new \DateTimeImmutable('2000-12-17')),
	new Student(null, 'Juliano Lages', new \DateTimeImmutable('2000-02-29')),
	new Student(null, 'Ana Paula Barros', new \DateTimeImmutable('2001-04-19')),
	new Student(null, 'Isabela Moraes', new \DateTimeImmutable('2002-07-31'))
];

try {
	$connection->beginTransaction();

	foreach ($class as $student) {
		$repository->save($student);
	}

	$connection->commit();
} catch (\Throwable $e) {
	echo "Erro ao tentar salvar alunos:" . PHP_EOL;
	fputs(STDERR, "{$e->getMessage()} em {$e->getFile()}:{$e->getLine()}" . PHP_EOL);
	$connection->rollBack();
}

$students = $repository->findAllByBithDate(new \DateTimeImmutable('2002-01-01'));

foreach ($students as $student)
	echo $student . PHP_EOL;

echo "\nTodos os alunos:" . PHP_EOL;
$students = $repository->findAll();

foreach ($students as $student) {
	echo $student . PHP_EOL;
}

echo "\nAlunos com telefone:" . PHP_EOL;
$students = $repository->studentsWithPhones();

foreach ($students as $student) {
	echo $student . PHP_EOL;
	foreach ($student->phones() as $key => $phone) {
		echo "	Telefone $key: {$phone->formattedPhone()}" . PHP_EOL;
	}
}
