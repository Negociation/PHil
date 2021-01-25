<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
{
    /**
     * @ORM\Column(name="name",type="string")
     */
    protected $completeName;


    public function getCompleteName()
    {
        return $this->completeName;
    }

    public function setCompleteName($name)
    {
        $this->completeName = $name;
    }
}
