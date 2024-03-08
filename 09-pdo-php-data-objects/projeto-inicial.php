<?php

use Xlucaspx\PhpPdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(null, 'Lucas Oliveira', new \DateTimeImmutable('2002-01-01'));

echo $student->age();
