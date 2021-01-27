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
		$classObject = new PessoaFisica();

		$classObject->setCompleteName($objetoPessoa["name"]);
		$classObject->setCPF(isset($objetoPessoa["cpf"]) ? $objetoPessoa["cpf"] : '');
		$classObject->setCNPJ(isset($objetoPessoa["cnpj"]) ? $objetoPessoa["cnpj"] : '');
		$classObject->setRG(isset($objetoPessoa["rg"]) ? $objetoPessoa["rg"] : '');
		$classObject->setUUID(isset($objetoPessoa["uuid"]) ? $objetoPessoa["uuid"] : '123456789');

		return $this->insert($classObject);
	}
}
