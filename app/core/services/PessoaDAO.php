<?php

namespace Services;

class PessoaDAO extends DAOService
{
	private $table = "naturalperson";
	private $column;

	public function getPessoas()
	{
		$result = $this->getAll($this->table);

		return $result;
	}

	public function getPessoaById($param)
	{
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

		return $result;
	}

	public function updatePessoa($obj)
	{
		$result = $this->update($obj);

		return $result;
	}
}
