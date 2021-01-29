<?php

namespace Models;

use Annotations\MER as MER;
use Annotations\Json as JSON;

/**
 * @MER\Tabela(nome="person")
 */
class PessoaFisica extends Pessoa
{

    /**
     * @MER\Coluna(nome="cpf", tipo="string")
     * * @JSON\jsonDeclare(nome="cpf")
     */
    protected $cpf;

    /**
     * @MER\Coluna(nome="cnpj", tipo="string")
     * * @JSON\jsonDeclare(nome="cnpj")
     */
    protected $cnpj;

    /**
     * @MER\Coluna(nome="rg", tipo="string")
     * * @JSON\jsonDeclare(nome="rg")
     */
    protected $rg;

    /**
     * @MER\Coluna(nome="uuid", tipo="string")
     * * @JSON\jsonDeclare(nome="uuid")
     */
    protected $uuid;


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
