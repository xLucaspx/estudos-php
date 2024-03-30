<?php

use Xlucaspx\CursoDoctrine\Entity\Phone;
use Xlucaspx\CursoDoctrine\Entity\Student;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

// $argv: array de argumentos passados para o programa; a posição 0 é o nome do script;
// $argc: o mesmo que count($argv);
$name = $argv[1];
$student = new Student($name);

for ($i = 2; $i < $argc; $i++) {
	$phone = new Phone($argv[$i]);
	$student->addPhone($phone);
}

$entityManager->persist($student);
// todas as inserções, alterações e remoções são processadas de uma única vez e
// enviadas em uma transação do banco de dados ao chamarmos o método flush
$entityManager->flush();
