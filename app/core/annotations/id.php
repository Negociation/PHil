<?php

namespace Annotations\MER;

/**
 * @Annotation
 */

class Id
{

    protected $tipo;

    public function __construct(array $values)
    {
        $this->tipo = isset($values['tipo']) ? $values['tipo'] : "Seq";
    }
}