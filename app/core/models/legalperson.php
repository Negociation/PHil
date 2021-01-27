<?php

namespace Models;

/**
 * @ORM\Entity
 * @ORM\Table(name="legalperson")
 */
class LegalPerson extends Pessoa
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="cnpj",type="string")
     */
    protected $cnpj;


    public function getId()
    {
        return $this->id;
    }

    public function getCNPJ()
    {
        return $this->cnpj;
    }

    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
    }
}
