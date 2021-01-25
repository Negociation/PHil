<?php

namespace Models;


use Annotations\MER as MER;

/**
 * @MER\Tabela
 */
class Person
{

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
