<?php

namespace Models;

use Annotations\MER as MER;

/**
 * @MER\Tabela(nome="person")
 */
class Person
{
	/**
	 * @MER\Coluna(nome="nomeusuario",tipo="text")
	 */
    protected $completeName;


    public function getCompleteName()
    {
        return $this->completeName;
    }

    public function setCompleteName($name)
    {
        $this->completeName = $name;
    }
}
