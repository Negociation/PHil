<?php

namespace core\model;

class Person
{
    public $completeName;

    public function getCompleteName()
    {
        return $this->completeName;
    }

    public function setCompleteName($name)
    {
        $this->completeName = $name;
    }
}
