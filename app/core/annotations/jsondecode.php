<?php

namespace Annotations\MER;

/**
 * @Annotation
 */

class JsonDecode
{

	public $nome;

	public function __construct(array $values)
	{
		$this->nome = $values['nome'];
	}
}
