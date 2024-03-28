<?php

use Xlucaspx\CursoDoctrine\Entity\Phone;
use Xlucaspx\CursoDoctrine\Entity\Student;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$name = $argv[1];

$student = new Student($name);

if (isset($argv[2])) {
	$phones = explode(',', $argv[2]);
	foreach ($phones as $number) {
		// $phone = new Phone($number);
		// $entityManager->persist($phone);
		// com o atributo cascade para o valor "persist" na classe Student não é mais
		// necessário persistir o telefone separadamente
		$student->addPhone(new Phone($number));
	}
}

$entityManager->persist($student);
// todas as inserções, alterações e remoções são processadas de uma única vez e
// enviadas em uma transação do banco de dados ao chamarmos o método flush
$entityManager->flush();
