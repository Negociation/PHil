<?php

namespace Models;

use Annotations\MER as MER;

/**
 * @MER\Tabela(nome="naturalperson")
 */
class NaturalPerson extends Person
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
    protected $uuid;


    function __construct()
    {
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->name;
    }

    public function setNome($name)
    {
        $this->name = $name;
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

    public function getCNPJ()
    {
        return $this->cnpj;
    }

    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
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
