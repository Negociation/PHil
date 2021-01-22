<?php

namespace Models;

class PessoaJuridica extends Pessoa
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
