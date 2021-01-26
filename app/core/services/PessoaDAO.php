<?php

namespace Services;

<<<<<<< Updated upstream
class PessoaDAO extends DAOService
{
	private $table = "naturalperson";
	private $column;

	public function getPessoas()
	{
		$result = $this->getAll($this->table);
=======
use Models;

class PessoaDAO extends DAOService
{

	public function getPessoas()
	{
		$result = $this->getAll("person");

		// CONSTRUIR OBJETO
>>>>>>> Stashed changes

		return $result;
	}

	public function getPessoaById($param)
	{
<<<<<<< Updated upstream
		$result = $this->getById($this->table, $param);

		return $result;
	}

	// @TODO: discutir como passar da melhor forma o parametro contendo o nome da coluna na tabela;
	public function getPessoaByCPF($param)
	{
		$result = $this->getByParam($this->table, $this->column, $param);

		return $result;
	}

	public function createPessoa($obj)
	{
		$result = $this->create($obj);
=======
		$result = $this->getById('', $param);

		/* CONSTRUIR OBJETO */

		return false;
	}

	public function getPessoaByCPF()
	{
		// $result = $this->getByParam($param);

		/* CONSTRUIR OBJETO */

		return false;
	}

	public function insertPessoa($pessoaObject)
	{
		$classObject = new Models\NaturalPerson(); /* objeto de teste, excluir depois */

		$classObject->setNome($pessoaObject["name"]);
		$classObject->setCPF(isset($pessoaObject["cpf"]) ? $pessoaObject["cpf"] : '');
		$classObject->setRG(isset($pessoaObject["rg"]) ? $pessoaObject["rg"] : '');
		$classObject->setCNPJ(isset($pessoaObject["cpnj"]) ? $pessoaObject["cpnj"] : '');
		$classObject->setUUID(isset($pessoaObject["uuid"]) ? $pessoaObject["uuid"] : '123456789');

		// print_r($classObject);

		$result = $this->insert($classObject);
>>>>>>> Stashed changes

		return $result;
	}

<<<<<<< Updated upstream
	public function updatePessoa($obj)
	{
		$result = $this->update($obj);

		return $result;
=======
	public function updatePessoa($objetoPessoa)
	{
		return false;
>>>>>>> Stashed changes
	}
}
