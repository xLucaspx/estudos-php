<?php

require_once 'autoload.php';

use Senac\Crud\Connection\Connection;

$con = Connection::getConnection();

var_dump($con);

