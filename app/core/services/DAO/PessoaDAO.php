<?php

namespace Services;

use Models\PessoaFisica;

use function PHPSTORM_META\type;

class PessoaDAO extends DAOService
{

	public function getPessoas()
	{
		$result = $this->getAll(new PessoaFisica());
		$resultArray = [];
		foreach ($result as $key => $row) { //Adicionar validação de multiplos objetos para a classe jsonService;
			array_push($resultArray, json_decode(JsonService::encode(array($row, new PessoaFisica()))));
		}

		return $resultArray;
	}


	public function getPessoaById($param)
	{
		$classObject = new PessoaFisica();
		$classObject->setId($param);
		$result = $this->getById($classObject);

		return is_array($result) ? json_decode(JsonService::encode(array($result, $classObject))) : false;
	}


	public function getPessoaByCPF($param)
	{
		$classObject = new PessoaFisica();

		$classObject->setCPF($param);

		return $this->getByParam($classObject, $classObject->getCPF());
	}


	public function insertPessoa($param)
	{
		$classObject = new PessoaFisica();

		if (($classObject = JsonService::decode($param, $classObject))) {

			return ($this->insert($classObject) ? json_decode($param) : false);
		}
	}


	public function updatePessoa($param)
	{
		$classObject = new PessoaFisica();

		if (($classObject = JsonService::decode($param, $classObject))) {

			return $this->update($classObject);
		}
	}


	public function deletePessoa($param)
	{
		$jsonObject = json_decode($param, true);

		if (isset($jsonObject['id'])) {

			$classObject = new PessoaFisica();
			$classObject->setId($jsonObject['id']);

			$result = $this->getById($classObject);

			return ($this->delete($classObject) ? $result : false);
		} else {
			return false;
		}
	}
}
