<?php

use Xlucaspx\CursoDoctrine\Entity\Student;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

 $student = $entityManager->find(Student::class, $argv[1]);

$entityManager->remove($student);
// precisa do flush para efetivamente remover
$entityManager->flush();
