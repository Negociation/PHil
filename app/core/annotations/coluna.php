<?php

namespace Annotations\MER;

/**
 * @Annotation
 */
 
class Coluna{
	
	public $nome;
	public $tipo;
	public $tamanho;
	
	public function __construct(array $values){
		$this->nome = $values['nome'];
		$this->tipo = $values['tipo'];
		$this->tamanho = (isset($values['tamanho']) ? $values['tamanho'] : 0);
	}
}
