<?php

namespace Senac\Crud\Connection;

use PDOException;

class Connection
{
	private static string $host = 'localhost:3306';
	private static string $database = 'crud_escola_php';
	private static string $username = 'root';
	private static string $password = 'admin';

	/**
	 * @return \PDO|false retorna a conexão quando esta é bem sucedida, false em qualquer outro caso
	 */
	public static function getConnection(): \PDO|false
	{
		try {
			$host = Connection::$host;
			$database = Connection::$database;
			return new \PDO("mysql:host=$host;dbname=$database", Connection::$username, Connection::$password);
		} catch (PDOException $e) {
			$msg = "Erro ao tentar realizar a conexão: {$e->getMessage()}\nem {$e->getFile()}:{$e->getLine()}" . PHP_EOL;
			fputs(STDERR, $msg);
			return false;
		}
	}
}
