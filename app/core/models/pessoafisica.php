<?php

namespace Models;

use Annotations\MER as MER;

/**
 * @MER\Tabela(nome="person")
 */
class PessoaFisica extends Pessoa
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

    public function getCNPJ()
    {
        return $this->cnpj;
    }

    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
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
