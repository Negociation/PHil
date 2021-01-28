<?php

namespace Annotations\Json;

/**
 * @Annotation
 */

class JsonDeclare
{

	public $nome;

	public function __construct(array $values)
	{
		$this->nome = $values['nome'];
	}
}
