<?php

namespace core\model;

class NaturalPerson extends Person
{
    private $cpf;
    private $rg;
    private $uuid;

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
