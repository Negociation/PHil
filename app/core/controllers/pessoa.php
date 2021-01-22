<?php

namespace Controllers;

use Services\PessoaDAO;

class Pessoa extends ControllerTemplate
{

	public function default()
	{
		//Person Objects Retrieved from Database (can be one record or a array or records)

		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				$pessoaObjects = (new PessoaDAO($this->dbConnection))->getPessoas();
				if ($pessoaObjects) {
					echo json_encode($pessoaObjects);
					http_response_code(200);
				} else {
					http_response_code(422);
				}
				break;

			case 'POST':
				$obj =  json_decode(file_get_contents('php://input'));
				$pessoaObjects = (new PessoaDAO($this->dbConnection))->createPessoa($obj);

				if ($pessoaObjects) {
					http_response_code(200);
				} else {
					http_response_code(422);
				}
				break;

			case 'PUT':
				$obj =  json_decode(file_get_contents('php://input'));
				$pessoaObjects = (new PessoaDAO($this->dbConnection))->updatePessoa($obj);

				if ($pessoaObjects) {
					http_response_code(200);
				} else {
					http_response_code(422);
				}
				break;
		}
	}

	public function id($param)
	{
		$pessoaObjects = (new PessoaDAO($this->dbConnection))->getPessoaById($param);

		if ($pessoaObjects) {
			echo json_encode($pessoaObjects);
			http_response_code(200);
		} else {
			http_response_code(422);
		}
	}

	// @TODO: tratar a forma como retorna o CPF
	public function cpf($param)
	{
		$pessoaObjects = (new PessoaDAO($this->dbConnection))->getPessoaByCPF($param);

		if ($pessoaObjects) {
			echo json_encode($pessoaObjects);
			http_response_code(200);
		} else {
			http_response_code(422);
		}
	}
}
