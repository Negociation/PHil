<?php

namespace Services;

class RouteService{

	public $requestURI;
	public $parsedURI = [];
	
	public function navigateTo(){
		
		// Cleaning the URL Brackets
		$requestURI = (substr($_SERVER["REQUEST_URI"],-1) == "/" ? substr($_SERVER["REQUEST_URI"],1,-1) : $_SERVER["REQUEST_URI"]);
		

		//If there any controller cuz URL isn't empty then
		if($requestURI != ""){
		
			$parsedURI = self::validateURI($requestURI);
			
			if(class_exists($parsedURI[0] = "Controllers\\".$parsedURI[0])){
				if(Method_Exists(new $parsedURI[0](),$parsedURI[1])){
					echo "Estou Vivo poha uhuuu!!!!";
				}else{
					echo "Morto!";
				}
					
				
			}else{
				echo "Not Found";
			}
		}else{
			echo "nothing";
		}
	}
	
	protected function validateURI($requestURI){
		
		$requestURI = strtolower(trim((substr($requestURI, 0,1) == "/" ? substr($_SERVER["REQUEST_URI"],1) : $requestURI)));
		
		$parsedURI = explode("/",filter_var($requestURI, FILTER_SANITIZE_URL));	
			
		if(count($parsedURI) == 1){
			array_push($parsedURI, "default");
		}
		return $parsedURI;
	}
}


?>