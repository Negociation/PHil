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

$conn = new Services\PDOService();

// + Verifying the Database Connection Status 
// - Desc: If there's a valid connection then Navigate 
if($conn->getConnectionStatus()){
	Services\RouteService::navigateTo($conn);
}


?>