<?php

use Xlucaspx\CursoDoctrine\Entity\Student;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);
// quando queremos buscar apenas uma entidade é possível utilizar o próprio entity manager, sem necessidade do repositório:
//$student = $entityManager->find(Student::class, $argv[1]);

$student = $studentRepository->find($argv[1]);
$student->setName($argv[2]);

// Não precisamos chamar o persist pois, como utilizamos o próprio Doctrine para buscar a entidade a ser atualizada,
// ela já estava sendo observada e gerenciada pelo Doctrine. Logo, quando fizemos as modificações em seus atributos
// e chamamos o flush, o Doctrine pôde verificar que houve modificações e as realizou no banco.
$entityManager->flush();
