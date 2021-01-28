<?php

namespace Services;

use Models\PessoaFisica;

class PessoaDAO extends DAOService
{

	public function getPessoas()
	{
		return $this->getAll(new PessoaFisica());
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

	public function insertPessoa($objetoPessoa)
	{
		$classObject = new PessoaFisica();

		$classObject->setCompleteName($objetoPessoa["name"]);
		$classObject->setCPF(isset($objetoPessoa["cpf"]) ? $objetoPessoa["cpf"] : '');
		$classObject->setCNPJ(isset($objetoPessoa["cnpj"]) ? $objetoPessoa["cnpj"] : '');
		$classObject->setRG(isset($objetoPessoa["rg"]) ? $objetoPessoa["rg"] : '');
		$classObject->setUUID(isset($objetoPessoa["uuid"]) ? $objetoPessoa["uuid"] : '123456789');

		return $this->insert($classObject);
	}

	public function updatePessoa($objetoPessoa)
	{

		// Verifica se o ID foi passado como parâmetro;
		if (isset($objetoPessoa['id'])) {

			// Retorna os dados armazenados no banco de dados;
			$storedData = $this->getPessoaById($objetoPessoa['id']);

			// Verifica se foi encontrado algum dado com base no ID;
			if (is_array($storedData)) {

				$updateObject = new PessoaFisica();

				// Dados que não podem ser alterados;
				$updateObject->setId($storedData['id']);
				$updateObject->setUUID($storedData['uuid']);

				// Dados que serão alterados:
				if (isset($objetoPessoa['name'])) {
					strcmp($objetoPessoa['name'], $storedData['name']) == 0 ?
						$updateObject->setCompleteName($storedData['name']) : $updateObject->setCompleteName($objetoPessoa['name']);
				} else {
					$updateObject->setCompleteName($storedData['name']);
				}

				if (isset($objetoPessoa['cpf'])) {
					strcmp($objetoPessoa['cpf'], $storedData['cpf']) == 0 ?
						$updateObject->setCPF($storedData['cpf']) : $updateObject->setCPF($objetoPessoa['cpf']);
				} else {
					$updateObject->setCPF($storedData['cpf']);
				}

				if (isset($objetoPessoa['rg'])) {
					strcmp($objetoPessoa['rg'], $storedData['rg']) == 0 ?
						$updateObject->setRG($storedData['rg']) : $updateObject->setRG($objetoPessoa['rg']);
				} else {
					$updateObject->setRG($storedData['rg']);
				}

				if (isset($objetoPessoa['cnpj'])) {
					strcmp($objetoPessoa['cnpj'], $storedData['cnpj']) == 0 ?
						$updateObject->setCNPJ($storedData['cnpj']) : $updateObject->setCNPJ($objetoPessoa['cnpj']);
				} else {
					$updateObject->setCNPJ($storedData['cnpj']);
				}

				// Salva novos dados no BD;
				return $this->update($updateObject);

				return true;
			} else {
				echo "ERRO->updatePessoa(): Pessoa não encontrada\n";
				return false;
			}
		} else {
			echo "ERRO->updatePessoa(): ID não foi enviado no corpo da requisição\n";
			return false;
		}
	}
}
