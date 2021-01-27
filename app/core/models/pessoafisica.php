<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

class PessoaFisica //extends Person
{

    /**
     * @MER\Coluna(nome="cpf", tipo="string")
     */
    protected $cpf;

    /**
     * @MER\Coluna(nome="cnpj", tipo="string")
     */
    protected $cnpj;

    /**
     * @MER\Coluna(nome="rg", tipo="string")
     */
    protected $rg;

    /**
     * @MER\Coluna(nome="uuid", tipo="string")
     */
	 

    public function getId()
    {
        return $this->id;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getRG()
    {
        return $this->rg;
    }

    public function setRG($rg)
    {
        $this->rg = $rg;
    }

    public function getUUID()
    {
        return $this->uuid;
    }

    public function setUUID($uuid)
    {
        $this->uuid = $uuid;
    }
}
