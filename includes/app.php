<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);  //enrutamiento a .env database
$dotenv->safeLoad();    //Sino esta el archivo .env no marque errores
require 'funciones.php';
require 'database.php';

//Conectar con la base de datos
$db = conectarDB();

use Model\ActiveRecord;
ActiveRecord::setDB($db);