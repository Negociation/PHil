<?php

namespace Services;

class PessoaDAO extends DAOService{
	
	public function getPessoas(){
		$result = $this->getAll("pessoas");
		
		/* CONSTRUIR OBJETO */
		
		return true;
	}

	public function getPessoaById($param){
		$result = getById($param);
		
		/* CONSTRUIR OBJETO */
		
		return false;
	}
	
	public function getPessoaByCPF(){
		$result = getByParam($param);
		
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
