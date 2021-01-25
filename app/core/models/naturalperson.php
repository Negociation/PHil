<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="naturalperson")
 */
class NaturalPerson //extends Person
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string");
     */
    protected $completeName;

    /**
     * @ORM\Column(name="cpf",type="string")
     */
    protected $cpf;

    /**
     * @ORM\Column(name="rg",type="string")
     */
    protected $rg;

    /**
     * @ORM\Column(name="uuid",type="string")
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
