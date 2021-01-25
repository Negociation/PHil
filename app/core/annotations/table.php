<?php

namespace Annotations\MER;


/**
 * @Annotation
 * @Target({"METHOD","PROPERTY"})
 */
 
public class Tabela{
	public function __construct(array $values){
		public $this->nome = $values['nome'];
	}
}
