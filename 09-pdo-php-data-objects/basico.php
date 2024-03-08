<?php

require_once './vendor/autoload.php';

use Xlucaspx\PhpPdo\Domain\Model\Student;

try {
	$dbPath = __DIR__ . '/db.sqlite';
	$pdo = new \PDO("sqlite:$dbPath");
	echo "Conectado!" . PHP_EOL;
} catch (Throwable $e) {
	echo "Erro ao tentar conectar no banco de dados:" . PHP_EOL;
	fputs(STDERR, "{$e->getMessage()} em {$e->getFile()}:{$e->getLine()}" . PHP_EOL);
	exit();
}

$pdo->exec("CREATE TABLE students (id INTEGER PRIMARY KEY, name text, birth_date text)");

$student = new Student(null, 'Lucas Oliveira', new \DateTimeImmutable('2002-01-01'));
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

echo $sqlInsert . PHP_EOL;
// o exec retorna o número de linhas afetadas:
var_dump($pdo->exec($sqlInsert));

// obviamente, devemos utilizar prepared statements ao trabalhar com bancos de dados; uma das formas de
// fazer isso com PDO é a seguinte:
$student = new Student(null, "Lucas ', ''); DROP TABLE students;", new \DateTimeImmutable('1997-10-15'));
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));
// o execute retorna um valor booleano
var_dump($statement->execute());

// também podemos utilizar parâmetros nomeados; não é possível misturar marcadores (?) e parâmetros nomeados
$student = new Student(null, "Pafúncio Pereira", new \DateTimeImmutable('1992-07-15'));
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
$statement->execute();
// bindValue(): passa o valor;
// bindParam(): passa a referência, ou seja, o PHP só pega o valor na hora da execução. Também nos possibilita
// passar a variável onde o parâmetro de saída é armazenado em casos que chamarmos funções stored procedures ou
// com parâmetro de saída

// para buscar dados do banco, precisamos utilizar query():
$statement = $pdo->query("SELECT id, name, birth_date FROM students");

// o formato padrão da busca do fetchAll (FETCH_BOTH) traz os dados de duas formas: numeric (NUM)
// e associativo (ASSOC):
// var_dump($statement->fetchAll());

// podemos definir o método de busca como apenas associativo, por exemplo:
$studentDataList = $statement->fetchAll(\PDO::FETCH_ASSOC);
// var_dump($studentDataList);

// podemos utilizar o FETCH_CLASS e o nome da classe que queremos retornar, e o PHP irá instanciar e
// popular uma classe com os dados trazidos do banco; isso pode gerar alguns problemas, por isso a recomendação
// é buscar como array associativo e depois iterar este array para instanciar os objetos:
$studentList = [];
foreach ($studentDataList as $studentData) {
	['id' => $id, 'name' => $name, 'birth_date' => $birthDate] = $studentData;
	$studentList[] = new Student($id, $name, new \DateTimeImmutable($birthDate));
}

var_dump($studentList);

// para retornar apenas um dado, podemos utilizar o fetch():
$statement = $pdo->query("SELECT id, name, birth_date FROM students WHERE id = 1");
$studentData = $statement->fetch(\PDO::FETCH_ASSOC);

var_dump($studentData);

// exemplo de código para iterar em uma base de dados grande sem precisar utilizar o fetchAll:
$statement = $pdo->query("SELECT id, name, birth_date FROM students");
while ($studentData = $statement->fetch(\PDO::FETCH_ASSOC)) {
	['id' => $id, 'name' => $name, 'birth_date' => $birthDate] = $studentData;
	$student = new Student($id, $name, new \DateTimeImmutable($birthDate));
	echo "Aluno: {$student->name()}, idade: {$student->age()} anos" . PHP_EOL;
}

// o fetch e o fetchColumn buscam a linha atual e deixam o cursor na próxima linha a cada chamada do método
// o fetchColumn serve para trazer o resultado de apenas uma coluna:
$statement = $pdo->query("SELECT id, name, birth_date FROM students WHERE id = 2");
var_dump($statement->fetchColumn(2));

// removendo por id com prepared statement:
$statement = $pdo->prepare("DELETE FROM students WHERE id = :id");
// podemos definir o tipo do parâmetro quando fazemos o bind:
$statement->bindValue(':id', 2, \PDO::PARAM_INT);
var_dump($statement->execute());

// prepared statements podem ser executado mais de uma vez:
$statement->bindValue(':id', 5, \PDO::PARAM_INT);
var_dump($statement->execute());
