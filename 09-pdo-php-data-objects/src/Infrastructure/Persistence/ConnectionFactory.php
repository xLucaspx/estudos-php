<?php

namespace Xlucaspx\PhpPdo\Infrastructure\Persistence;

use PDO;

class ConnectionFactory
{
	// padrão static creation method
	public static function createConnection(): \PDO
	{
//		$dbPath = __DIR__ . "/../../../db.sqlite";
//		$pdo = new \PDO("sqlite:$dbPath");
		$pdo = new \PDO('mysql:host=localhost;port=3306;dbname=php_pdo', 'user01', 'admin');

		// A partir da versão 8 do PHP o modo padrão de reportar erros do PDO já é lançando exceções
		// $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		// definindo modo de fetch padrão como associativo:
		$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
		return $pdo;

	}
}
