<?php

namespace Services;

use Models\PessoaFisica;

class PessoaDAO extends DAOService
{

	public function getPessoas()
	{
		

		$result = $this->getAll(new PessoaFisica());
		$result = [["name" => "1","id" => "1"],["name" => "1","id" => "1"]];
		$resultArray = [];
		foreach($result as $key => $row){ //Adicionar validação de multiplos objetos para a classe jsonService;
			array_push($resultArray,json_decode(JsonService::encode(array($row,new PessoaFisica()))));
		}
		
		return $resultArray;
	}

	public function getPessoaById($param)
	{
		$classObject = new PessoaFisica();

		$classObject->setId($param);

		return $this->getById($classObject);
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

		// Verifica se o ID foi passado como parâmetro;
		if (isset($param['id'])) {

			// Retorna os dados armazenados no banco de dados;
			$storedData = $this->getPessoaById($param['id']);

			// Verifica se foi encontrado algum dado com base no ID;
			if (is_array($storedData)) {

				$updateObject = new PessoaFisica();

				// Dados que não podem ser alterados;
				$updateObject->setId($storedData['id']);
				$updateObject->setUUID($storedData['uuid']);

				// Dados que serão alterados:
				if (isset($param['name'])) {
					strcmp($param['name'], $storedData['name']) == 0 ?
						$updateObject->setCompleteName($storedData['name']) : $updateObject->setCompleteName($param['name']);
				} else {
					$updateObject->setCompleteName($storedData['name']);
				}

				if (isset($param['cpf'])) {
					strcmp($param['cpf'], $storedData['cpf']) == 0 ?
						$updateObject->setCPF($storedData['cpf']) : $updateObject->setCPF($param['cpf']);
				} else {
					$updateObject->setCPF($storedData['cpf']);
				}

				if (isset($param['rg'])) {
					strcmp($param['rg'], $storedData['rg']) == 0 ?
						$updateObject->setRG($storedData['rg']) : $updateObject->setRG($param['rg']);
				} else {
					$updateObject->setRG($storedData['rg']);
				}

				if (isset($param['cnpj'])) {
					strcmp($param['cnpj'], $storedData['cnpj']) == 0 ?
						$updateObject->setCNPJ($storedData['cnpj']) : $updateObject->setCNPJ($param['cnpj']);
				} else {
					$updateObject->setCNPJ($storedData['cnpj']);
				}

				// Salva novos dados no BD;
				return $this->update($updateObject);
			} else {
				echo "ERRO->updatePessoa(): Pessoa não encontrada\n";
				return false;
			}
		} else {
			echo "ERRO->updatePessoa(): ID não foi enviado no corpo da requisição\n";
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
			echo "ERRO->deletePessoa(): ID não foi enviado no corpo da requisição\n";

			return false;
		}
	}
}
