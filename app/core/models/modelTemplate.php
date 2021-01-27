<?php

namespace Models;

class ModelTemplate
{
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            return false;
        }
    }
}
