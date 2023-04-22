<?php 

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';


//Conectarse a la base de datos
$db = conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);