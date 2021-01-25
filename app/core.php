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


//Registry all doctrine annotations
if (class_exists(Doctrine\Common\Annotations\AnnotationRegistry::class)) {
    Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
}


// + Verifying the Database Connection Status 
// - Desc: If there's a valid connection then Navigate 
if((new Services\PDOService())->getConnectionStatus()){
	Services\RouteService::navigateTo();
}else{
	http_response_code(500);
	echo json_encode(array("message" => "Could not connect to the database"));
}
?>