<?php

namespace Annotations\MER;

/**
 * @Annotation
 */
 
class Tabela{
	
	public $nome;
	
	public function __construct(array $values){
		$this->nome = $values['nome'];
	}
}
