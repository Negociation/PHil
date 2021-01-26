<?php

namespace Models;

class Pessoa
{
<<<<<<< Updated upstream:app/core/models/pessoa.php
    protected $completeName;
=======

    /**
     * @MER\Coluna(nome="id", tipo="integer")
     * @MER\Id
     */
    protected $id;

    /**
     * @MER\Coluna(nome="name",tipo="text")
     */
    protected $name;
>>>>>>> Stashed changes:app/core/models/person.php

    public function getCompleteName()
    {
        return $this->completeName;
    }

    public function setCompleteName($name)
    {
        $this->completeName = $name;
    }
}
