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
					http_response_code(200);
					echo json_encode($pessoaObjects);
				}else{
					http_response_code(422);
				}	
				break;
			case 'POST':
				$pessoaObject =  json_decode(file_get_contents('php://input'));
				
				$postResult = ($this->container->get('Services\PessoaDAO'))->insertPessoa($pessoaObject);
				
				if ($postResult){
					http_response_code(200);
				}else{
					http_response_code(422);
				}
			break;
			case 'PUT':
				$pessoaObject =  json_decode(file_get_contents('php://input'));
				
				$putResult = ($this->container->get('Services\PessoaDAO'))->updatePessoa($pessoaObject);
				
				if ($putResult){
					http_response_code(200);
				}else{
					http_response_code(422);
				}
			break;
			
		}
		
	}
	
	public function id($param){
		
		echo $param;
	}
}


?>