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
			return $this->insert($classObject);
		}
	}


	public function updatePessoa($param)
	{
		$classObject = new PessoaFisica();

		if (($classObject = JsonService::decode($param, $classObject))) {
			return $this->update($classObject);
		}

		// if (isset($param['id'])) {

		// 	$classObject = new PessoaFisica();
		// 	$classObject->setId($param['id']);
		// 	$getResult = $this->getById($classObject);

		// 	if ($getResult) {

		// 		JsonService::decode($param, $classObject);

		// foreach ($param as $key => $row) {
		// 	if ($key != 'id')
		// 		if (!strcmp($row, $getResult[$key]) == 0) $getResult[$key] = $param[$key];
		// }
		// foreach ($getResult as $key => $row) {
		// 	if ($key != 'id') {
		// 		$classObject->__set($key, $getResult[$key]);
		// 	}
		// }

		// 		return $this->update($classObject);
		// 	} else {
		// 		echo json_encode(array("message" => "Error: Data not found on BD"));
		// 		return false;
		// 	}
		// } else {
		// 	echo json_encode(array("message" => "Error: ID not send on requisitions body"));
		// 	return false;
		// }
	}

	public function deletePessoa($param)
	{
		$jsonObject = json_decode($param, true);

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
