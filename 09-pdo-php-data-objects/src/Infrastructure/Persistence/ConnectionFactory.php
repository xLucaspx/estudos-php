<?php

namespace Xlucaspx\PhpPdo\Infrastructure\Persistence;

class ConnectionFactory
{
	// padrão static creation method
	public static function createConnection(): \PDO
	{
		$dbPath = __DIR__ . "/../../../db.sqlite";
		$pdo = new \PDO("sqlite:$dbPath");

		return $pdo;
	}
}
