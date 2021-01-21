<?php

namespace Services;

class RouteService{

	public $requestURI;

	function __construct(){
		$requestURI = $_SERVER["REQUEST_URI"];
		
		
	}
}


?>