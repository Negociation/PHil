<?php

namespace Controllers;

use Services;

class Pessoa extends ControllerTemplate
{

	public function default()
	{
		//Person Objects Retrieved from Database (can be one record or a array or records)

		switch ($_SERVER['REQUEST_METHOD']) {

			case 'GET':

				//Get All Persons from database using the dependency container
				$pessoaObjects = ($this->container->get('Services\PessoaDAO'))->getPessoas();

				if (is_array($pessoaObjects)) {
					http_response_code(200);
					echo json_encode($pessoaObjects);
				} else {
					http_response_code(422);
				}
				break;

			case 'POST':

				$postResult = ($this->container->get('Services\PessoaDAO'))->insertPessoa($this->httpInput);

				if (!$postResult) {
					http_response_code(200);
					// echo json_encode($postResult);
				} else {
					http_response_code(422);
				}
				break;

			case 'PUT':
				$putResult = ($this->container->get('Services\PessoaDAO'))->updatePessoa($this->httpInput);

				if (!$putResult) {
					http_response_code(200);
					echo json_encode($putResult);
				} else {
					http_response_code(422);
				}
				break;

			case 'DELETE':
				$deleteResult = ($this->container->get('Services\PessoaDAO'))->deletePessoa($this->httpInput);

				if ($deleteResult) {
					http_response_code(200);
					echo json_encode($deleteResult);
				} else {
					http_response_code(422);
				}
				break;
		}
	}

	public function id($param)
	{
		if (is_numeric($param) && !is_null($param)) {
			$pessoaObject = ($this->container->get('Services\PessoaDAO'))->getPessoaById($param);

			if ($pessoaObject) {
				http_response_code(200);
				echo json_encode($pessoaObject);
			} else {
				http_response_code(422);
			}
		} else {
			http_response_code(201);
			echo json_encode(array("message" => "ID must be a number"));
		}
	}

	public function cpf($param)
	{
		if (is_numeric($param) && !is_null($param)) {
			$pessoaObject = ($this->container->get('Services\PessoaDAO'))->getPessoaByCPF($param);

			if ($pessoaObject) {
				http_response_code(200);
				echo json_encode($pessoaObject);
			} else {
				http_response_code(422);
			}
		} else {
			http_response_code(201);
			echo json_encode(array("message" => "CPF error"));
		}
	}
}
