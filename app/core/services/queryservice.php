<?php

namespace Services;

use Doctrine\Common\Annotations\AnnotationReader;

class QueryService{
	
	protected $tableName;
	protected $properties = [];
	protected $bindParams = [];
	protected $insertQuery;
	protected $updateQuery;

	
	function __construct($modelObject){
		
		//Reflection Object
		$reflectionClass = new \ReflectionClass(get_class($modelObject));
		$annotationReader = new AnnotationReader();

		//Get Table Name
		$this->tableName = $annotationReader->getClassAnnotations($reflectionClass)[0]->nome;
		
		//Get Properties	
		foreach ($reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED) as $prop) {
			//Annotations of Property
			$obj = $annotationReader->getPropertyAnnotations(new \ReflectionProperty($reflectionClass->getName(), $prop->getName()))[0];
			
			//Push Annotation
			array_push($this->properties,$obj);
			
			
		}
		
		
		//Prepare SQL Statements
		foreach($this->properties as $key => $property){
			
			//Prepare Binds
			array_push($this->bindParams,[":".$obj->nome,$obj->nome]);
				
			if($key === array_key_last($this->properties)){
				$values = "";
				$binds = "";
				foreach($this->bindParams as $key => $bindParam){
					
					$values = (($key === array_key_last($this->bindParams)) ? ($values.$bindParam[1]) : ($values.$bindParam[1].","));
					
					$binds = ($key === array_key_last($this->bindParams)) ? $binds.$bindParam[0] : $binds.$bindParam[0].",";
							
				}
				$this->insertQuery =  "INSERT INTO ".$this->tableName."(".$values.") VALUES(".$binds.")";
			}
		}		
	}
    
	public function get_insertQuery(){
		return $this->insertQuery;
	}
	
	public function get_updateQuery(){
		return $this->insertQuery;
	}
	
	public function get_bindParams(){
		return $this->bindParams;
	}
	
}


?>