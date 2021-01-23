<?php
namespace Controllers;

use Services;

class Pessoa extends ControllerTemplate{
	
	public function default(){
		
		//Person Objects Retrieved from Database (can be one record or a array or records)
		
		
		switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
			
				//Get All Persons from database using the dependency container
				$pessoaObjects = ($this->container->get('Services\PessoaDAO'))->getPessoas();
				
				if($pessoaObjects){
					echo json_encode($pessoaObjects);
					http_response_code(200);
				}else{
					http_response_code(422);
				}	
				break;
			case 'POST':
				echo "DEFAULT POST";
			break;
			case 'PUT':
				echo "DEFAULT PUT";
			break;
			
		}
		
	}
	
	public function id($param){
		
		echo $param;
	}
}


?>