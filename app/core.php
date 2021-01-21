<?php

// + Setting Default Configuration Timeout 
// - Desc: Preveting errors during Install
ini_set('max_execution_time', 300); 


// + Setting Default Cookie Mode
// - Desc: Preveting XSS Atacks
ini_set('session.cookie_httponly', 1);

// + Adding Autoload 
// - Desc: Add Autoload include file
require_once  __DIR__.'/vendor/autoload.php';


/* REFATORAR  --> */

$dbSettings = parse_ini_file(dirname(__DIR__,1).'\app\core\settings.ini', true);


$erroDb = false;
try {

  $conn = new PDO("mysql:host=".$dbSettings['database']['host'].";dbname=".$dbSettings['database']['name'], $dbSettings['database']['user'], $dbSettings['database']['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $erroDb = true;
}

Services\RouteService::navigateTo(); //REMOVER 

if(!$erroDb){
	Services\RouteService::navigateTo();
}


?>