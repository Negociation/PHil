<?php

namespace core\model;

class LegalPerson extends Person
{
    private $cnpj;

    public function getCNPJ()
    {
        return $this->cnpj;
    }

    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
    }
}
