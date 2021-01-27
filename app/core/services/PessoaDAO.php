<?php

namespace Services;

class PessoaDAO extends DAOService{
	
	public function getPessoas(){
		$result = $this->getAll(new \Models\Person());
		
		/* CONSTRUIR OBJETO */
		
		return true;
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
		return false;
	}

	public function updatePessoa($objetoPessoa){
		return false;
	}	
	
	
}
