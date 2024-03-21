<?php

use Xlucaspx\CursoDoctrine\Helper\EntityManagerCreator;

require_once 'vendor/autoload.php';

var_dump(EntityManagerCreator::createEntityManager());

// Alguns comandos:

// php .\bin\doctrine.php

// php .\bin\doctrine.php orm:schema-tool:create

// php .\bin\doctrine.php dbal:run-sql "SELECT * FROM Student"

// php .\bin\doctrine.php orm:info -> Show basic information about all mapped entities

// php .\bin\doctrine.php orm:mapping:describe <Entity> -> Display information about mapped objects
