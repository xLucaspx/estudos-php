<?php

use Xlucaspx\CursoDoctrine\Entity\Course;
use Xlucaspx\CursoDoctrine\Entity\Student;
use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentId = $argv[1];
$courseId = $argv[2];

/** @var Student $student */
$student = $entityManager->find(Student::class, $studentId);
/** @var Course $course */
$course = $entityManager->find(Course::class, $courseId);

$student->enrolInCourse($course);

$entityManager->flush();
