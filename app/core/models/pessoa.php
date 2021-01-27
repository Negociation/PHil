<?php

namespace Models;

use Annotations\MER as MER;

/**
 * @MER\Tabela(nome="person")
 */
class Pessoa{
	
	/**
	 * @MER\Coluna(nome="nomeusuario",tipo="text")
	 */
    protected $completeName;

    /**
     * @MER\Coluna(nome="id", tipo="integer")
     * @MER\Id
     */
    protected $id;
	
    public function getCompleteName(){
        return $this->completeName;
    }

    public function setCompleteName($name){
        $this->completeName = $name;
    }
	
	public function getId(){
		return $this->id;
	}
	
	public function setId(){
		return $this->id;
	}
	
}
