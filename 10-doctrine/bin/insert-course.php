<?php

use Xlucaspx\CursoDoctrine\Entity\Course;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$name = $argv[1];

$course = new Course($name);

$entityManager->persist($course);
$entityManager->flush();
