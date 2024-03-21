<?php

namespace Xlucaspx\CursoDoctrine\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{

	public static function createEntityManager(): EntityManager
	{
		$config = ORMSetup::createAttributeMetadataConfiguration(
			paths: [__DIR__ . "/.."],
			isDevMode: true,
		);

		$connection = DriverManager::getConnection([
			'driver' => 'pdo_sqlite',
			'path' => __DIR__ . "/../../db/db.sqlite"
		], $config);

		return new EntityManager($connection, $config);
	}
}
