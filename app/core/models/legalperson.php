<?php

namespace Models;

class LegalPerson extends Person
{
    protected $cnpj;

    public function getCNPJ()
    {
        return $this->cnpj;
    }

    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
    }
}
