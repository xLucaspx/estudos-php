<?php

namespace Xlucaspx\PhpPdo\Infrastructure\Repository;

use Xlucaspx\PhpPdo\Domain\Model\Student;
use Xlucaspx\PhpPdo\Domain\Repository\StudentRepository;
use Xlucaspx\PhpPdo\Infrastructure\Persistence\ConnectionFactory;

class PdoStudentRepository implements StudentRepository
{
	

	public function __construct(
		private \PDO $connection
	)
	{}

	public function findAll(): array
	{
		$statement = $this->connection->query('SELECT id, name, birth_date FROM students');
		return $this->hydrateStudentList($statement);
	}

	public function findAllByBithDate(\DateTimeInterface $birthDate): array
	{
		$sql = 'SELECT id, name, birth_date FROM students WHERE birth_date = :birthDate';
		$statement = $this->connection->prepare($sql);
		$statement->execute(['birthDate' => $birthDate->format('Y-m-d')]);

		return $this->hydrateStudentList($statement);
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

		while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
			['id' => $id, 'name' => $name, 'birth_date' => $birthDate] = $row;
			$list[] = new Student($id, $name, new \DateTimeImmutable($birthDate));
		}

		return $list;
	}
}
