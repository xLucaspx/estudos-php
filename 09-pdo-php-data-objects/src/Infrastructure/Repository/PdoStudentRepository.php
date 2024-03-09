<?php

namespace Xlucaspx\PhpPdo\Infrastructure\Repository;

use DateTimeImmutable;
use Xlucaspx\PhpPdo\Domain\Model\Phone;
use Xlucaspx\PhpPdo\Domain\Model\Student;
use Xlucaspx\PhpPdo\Domain\Repository\StudentRepository;

class PdoStudentRepository implements StudentRepository
{
	public function __construct(
		private \PDO $connection
	) {}

	/** @return Student[] */
	public function findAll(): array
	{
		$statement = $this->connection->query('SELECT id, name, birth_date FROM students');
		return $this->hydrateStudentList($statement);
	}

	/** @return Student[] */
	public function findAllByBithDate(\DateTimeInterface $birthDate): array
	{
		$sql = 'SELECT id, name, birth_date FROM students WHERE birth_date = :birthDate';
		$statement = $this->connection->prepare($sql);
		$statement->execute(['birthDate' => $birthDate->format('Y-m-d')]);

		return $this->hydrateStudentList($statement);
	}

	/** @return Student[] */
	public function studentsWithPhones(): array
	{
		$sql = 'SELECT
			s.id AS student_id,
			s.name,
			s.birth_date,
			p.id AS phone_id,
			p.area_code,
			p.number
			FROM students s INNER JOIN phones p
			WHERE s.id = p.student_id';
		$statement = $this->connection->query($sql);
		$result = $statement->fetchAll();

		$studentList = [];
		foreach ($result as $row) {
			['student_id' => $studentId] = $row;

			// neste método, implementamos de forma muito rudimentar uma estrutura de dados que lembra um conjunto/set:
			if (!array_key_exists($studentId, $studentList)) {
				['name' => $name, 'birth_date' => $birthDate] = $row;
				$studentList[$studentId] = new Student($studentId, $name, new \DateTimeImmutable($birthDate));
			}

			['phone_id' => $phoneId, 'area_code' => $areaCode, 'number' => $number] = $row;
			$phone = new Phone($phoneId, $areaCode, $number);
			$studentList[$studentId]->addPhone($phone);
		}

		return $studentList;
	}

	public function save(Student $student): bool
	{
		if (is_null($student->id()))
			return $this->insert($student);

		return $this->update($student);
	}

	public function remove(Student $student): bool
	{
		$statement = $this->connection->prepare('DELETE FROM students WHERE id = :id');
		$statement->bindValue(':id', $student->id(), \PDO::PARAM_INT);

		return $statement->execute();
	}

	private function insert(Student $student): int|false
	{
		$sql = 'INSERT INTO students (name, birth_date) VALUES (:name, :birthDate)';
		$statement = $this->connection->prepare($sql);

		$success = $statement->execute([
			'name' => $student->name(),
			'birthDate' => $student->birthDate()->format('Y-m-d')
		]);

		// if ($success) $student->defineId($this->connection->lastInsertId());

		return $success;
	}

	private function update(Student $student): bool
	{
		$sql = 'UPDATE students SET name = :name, birth_date = :birthDate WHERE id = :id';
		$statement = $this->connection->prepare($sql);
		$statement->bindValue(':name', $student->name());
		$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
		$statement->bindValue(':id', $student->id(), \PDO::PARAM_INT);

		return $statement->execute();
	}

	// O conceito de "hidratar" é um padrão que simplesmente transfere dados de uma camada para outra;
	// ou seja, estamos trazendo da camada do banco de dados para a de domínio
	private function hydrateStudentList(\PDOStatement $statement): array
	{
		$list = [];

		// não passamos o modo para fetch pois já definimos um padrão via atributo na classe ConnectionFactory
		while ($row = $statement->fetch()) {
			['id' => $id, 'name' => $name, 'birth_date' => $birthDate] = $row;
			$list[] = new Student($id, $name, new \DateTimeImmutable($birthDate));
		}
		return $list;
	}

// Esta forma de buscar pode ocasionar um problema N + 1, vamos utilizar outra abordagem
//	private function fillPhonesOf(Student $student): void
//	{
//		$sql = 'SELECT `id`, `area_code`, `number` FROM `phones` WHERE `student_id` = :id';
//		$statement = $this->connection->prepare($sql);
//		$statement->bindValue(':id', $student->id(), \PDO::PARAM_INT);
//		$statement->execute();
//
//		while ($phoneData = $statement->fetch()) {
//			['id' => $id, 'area_code' => $areaCode, 'number' => $number] = $phoneData;
//			$student->addPhone(new Phone($id, $areaCode, $number));
//		}
//	}
}
