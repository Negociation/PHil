<?php

namespace Services;

class PessoaDAO extends DAOService{
	
	public function getPessoas(){
		$result = $this->getAll("pessoas");
		
		/* CONSTRUIR OBJETO */
		
		return false;
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
	
	
	
}
