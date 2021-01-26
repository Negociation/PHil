<?php

namespace Controllers;

use Services\PessoaDAO;

class Pessoa extends ControllerTemplate
{

<<<<<<< Updated upstream
	public function default()
	{
		//Person Objects Retrieved from Database (can be one record or a array or records)

		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				$pessoaObjects = (new PessoaDAO($this->dbConnection))->getPessoas();
				if ($pessoaObjects) {
=======
class Pessoa extends ControllerTemplate
{

	public function default()
	{

		//Person Objects Retrieved from Database (can be one record or a array or records)
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				//Get All Persons from database using the dependency container
				$pessoaObjects = ($this->container->get('Services\PessoaDAO'))->getPessoas();

				if ($pessoaObjects !== null) {
>>>>>>> Stashed changes
					echo json_encode($pessoaObjects);
					http_response_code(200);
				} else {
					http_response_code(422);
				}
				break;

			case 'POST':
<<<<<<< Updated upstream
				$obj =  json_decode(file_get_contents('php://input'));
				$pessoaObjects = (new PessoaDAO($this->dbConnection))->createPessoa($obj);

				if ($pessoaObjects) {
=======
				$pessoaObject =  json_decode(file_get_contents('php://input'), true);

				$postResult = ($this->container->get('Services\PessoaDAO'))->insertPessoa($pessoaObject);

				if ($postResult) {
>>>>>>> Stashed changes
					http_response_code(200);
				} else {
					http_response_code(422);
				}
				break;
<<<<<<< Updated upstream

			case 'PUT':
				$obj =  json_decode(file_get_contents('php://input'));
				$pessoaObjects = (new PessoaDAO($this->dbConnection))->updatePessoa($obj);

				if ($pessoaObjects) {
=======
			case 'PUT':
				$pessoaObject =  json_decode(file_get_contents('php://input'));

				$putResult = ($this->container->get('Services\PessoaDAO'))->updatePessoa($pessoaObject);

				if ($putResult) {
>>>>>>> Stashed changes
					http_response_code(200);
				} else {
					http_response_code(422);
				}
				break;
		}
	}

	public function id($param)
	{
<<<<<<< Updated upstream
		$pessoaObjects = (new PessoaDAO($this->dbConnection))->getPessoaById($param);

		if ($pessoaObjects) {
			echo json_encode($pessoaObjects);
			http_response_code(200);
=======
		$pessoaObject = ($this->container->get('Services\PessoaDAO'))->getPessoaById($param);

		if ($pessoaObject) {
			http_response_code(200);
			echo json_encode($pessoaObject);
>>>>>>> Stashed changes
		} else {
			http_response_code(422);
		}
	}
<<<<<<< Updated upstream

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
=======
>>>>>>> Stashed changes
}
