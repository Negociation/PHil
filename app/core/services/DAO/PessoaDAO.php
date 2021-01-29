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

		return is_array($result) ? JsonService::encode($result, $classObject) : false;
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

		$classObject->setCompleteName($param["name"]);
		$classObject->setCPF(isset($param["cpf"]) ? $param["cpf"] : '');
		$classObject->setCNPJ(isset($param["cnpj"]) ? $param["cnpj"] : '');
		$classObject->setRG(isset($param["rg"]) ? $param["rg"] : '');
		$classObject->setUUID(isset($param["uuid"]) ? $param["uuid"] : md5(uniqid(rand(), true)));

		return $this->insert($classObject);
	}

	public function updatePessoa($param)
	{
		if (isset($param['id'])) {

			$personToUpdate = new PessoaFisica();
			$personToUpdate->setId($param['id']);
			$result = $this->getById($personToUpdate);

			foreach ($param as $key => $row) {
				if ($key != 'id')
					if (!strcmp($row, $result[$key]) == 0)
						$result[$key] = $param[$key];
			}

			foreach ($result as $key => $row) {
				if ($key != 'id') {
					$personToUpdate->__set($key, $result[$key]);
				}
			}
			// return $this->update($personToUpdate);

		} else {
			echo json_encode(array("message" => "Error: ID not send on requisitions body"));
			return false;
		}
	}

	public function deletePessoa($param)
	{
		if (isset($param['id'])) {

			$classObject = new PessoaFisica();

			$classObject->setId($param['id']);

			return $this->delete($classObject);
		} else {
			echo json_encode(array("message" => "Error: ID not send on requisitions body"));
			return false;
		}
	}
}
