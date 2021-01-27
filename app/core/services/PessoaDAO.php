<?php

namespace Services;

class PessoaDAO extends DAOService{
	
	public function getPessoas(){
		$result = $this->getAll(new \Models\Pessoa());
		
		/* CONSTRUIR OBJETO */
		
		return $result;
	}

	public function getPessoaById($param){
		$result = $this->getById('',$param);
		
		/* CONSTRUIR OBJETO */
		
		return false;
	}
	
	public function getPessoaByCPF(){
		$result = $this->getByParam($param);
		
		/* CONSTRUIR OBJETO */		
		
		return false;
	}
	
	public function insertPessoa($objetoPessoa){
		
		$classObject = new Models\Pessoa(); 
		$classObject->setNome($pessoaObject["name"]);
		$classObject->setCPF(isset($pessoaObject["cpf"]) ? $pessoaObject["cpf"] : '');
		$classObject->setRG(isset($pessoaObject["rg"]) ? $pessoaObject["rg"] : '');
		$classObject->setCNPJ(isset($pessoaObject["cpnj"]) ? $pessoaObject["cpnj"] : '');
		$classObject->setUUID(isset($pessoaObject["uuid"]) ? $pessoaObject["uuid"] : '123456789');

		
		$result = $this->insert($classObject);
	}

	public function updatePessoa($objetoPessoa){
		return false;
	}	
	
	
}
