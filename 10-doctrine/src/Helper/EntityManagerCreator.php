<?php

namespace Xlucaspx\CursoDoctrine\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class EntityManagerCreator
{

	public static function createEntityManager(): EntityManager
	{
		$config = ORMSetup::createAttributeMetadataConfiguration(
			paths: [__DIR__ . "/.."],
			isDevMode: true,
		);

		// utilizando middleware de log para exibir SQL no console:
		$consoleOutput = new ConsoleOutput(OutputInterface::VERBOSITY_DEBUG);
		$consoleLogger = new ConsoleLogger($consoleOutput);
		$logMiddleware = new Middleware($consoleLogger);

		$config->setMiddlewares([$logMiddleware]);

		/* Em desenvolvimento, não devemos utilizar cache (é um tiro no pé); apenas para princípios didáticos:
		// definindo caches:
		$cacheDirectory = __DIR__ . '/../../var/cache';

		// caches de query e metadata podem ser armazenados em arquivos sem problemas pois serão idênticos independente
		// do servidor e não precisam ser acessados fora dele; cache de resultado de query não deve ser armazenado em arquivos.
		// para invalidar este caches podemos executar os comandos do doctrine orm:clear-cache:metadata e orm:clear-cache:query
		// Em produção, sempre que fazemos um deploy, o ideal é limpar o cache.

		$config->setMetadataCache(new PhpFilesAdapter(
			namespace: 'metadata_cache',
			directory: $cacheDirectory
		));

		$config->setQueryCache(new PhpFilesAdapter(
			namespace: 'query_cache',
			directory: $cacheDirectory
		));
		*/

		$connection = DriverManager::getConnection([
			// 'driver' => 'pdo_sqlite',
			// 'path' => __DIR__ . "/../../db/db.sqlite"
			'driver' => 'pdo_mysql',
			'host' => '127.0.0.1',
			'port' => '3306',
			'dbname' => 'php_doctrine',
			'user' => 'user01',
			'password' => 'admin'
		], $config);

		return new EntityManager($connection, $config);
	}
}
