<?php

namespace Services;

use Doctrine\Common\Annotations\AnnotationReader;

class QueryService
{

	protected $tableName;
	protected $idField;
	protected $properties = [];
	protected $bindParams = [];
	protected $selectAllQuery;
	protected $insertQuery;
	protected $updateQuery;
	protected $deleteQuery;
	protected $translatedObject = [];


	function __construct($modelObject)
	{
		if (is_object($modelObject)) {

			//Initialize
			$this->idField = -1;

			//Reflection Object
			$reflectionClass = new \ReflectionClass(get_class($modelObject));
			$annotationReader = new AnnotationReader();

			//Get Table Name
			$this->tableName = $annotationReader->getClassAnnotations($reflectionClass)[0]->nome;


			$mappingName = [];

			//Get Properties	
			foreach ($reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED) as $prop) {
				//Annotations of Property
				$obj = $annotationReader->getPropertyAnnotations(new \ReflectionProperty($reflectionClass->getName(), $prop->getName()));

				array_push($mappingName, $prop->getName());

				//Push Annotation
				array_push($this->properties, $obj);
			}

			//Prepare SQL Statements
			foreach ($this->properties as $key => $propertyArray) {
				foreach ($propertyArray as $property) {
					//Get Id Column
					if (get_class($property) == 'Annotations\MER\Id') {
						if ($this->idField > -1) {
							throw new \Exception('Multiple Primary Keys defined at Model (' . get_class($modelObject) . ').');
							exit();
						} else {
							$this->idField = $key;
						}
					}

					//Prepare SQL Binds
					if (get_class($property) == 'Annotations\MER\Coluna') {
						$this->translatedObject[$property->nome] = $mappingName[$key];
						array_push($this->bindParams, [$property->nome, $modelObject->__get($mappingName[$key])]);
						var_dump($modelObject->__get($mappingName[$key]));
						if (is_null($modelObject->__get($mappingName[$key]))) {
						}
					}
				}

				if ($key === array_key_last($this->properties)) {
					$values = "";
					$binds = "";


					foreach ($this->bindParams as $bindKey => $bindParam) {

						if ($bindKey != $this->idField) {
							$values = (($bindKey === array_key_last($this->bindParams)) ? ($values . $bindParam[0]) : ($values . $bindParam[0] . ","));
							$binds = ($bindKey === array_key_last($this->bindParams)) ? $binds . ":" . $bindParam[0] : $binds . ":" . $bindParam[0] . ",";
						} else {
						}


						if ($bindKey === array_key_last($this->bindParams)) {

							$values = (substr($values, -1, 1) == ',') ? substr($values, 0, -1) : $values;
							$binds = (substr($binds, -1, 1) == ',') ? substr($binds, 0, -1) : $binds;


							//Generate Select All
							$this->selectAllQuery = "SELECT * FROM " . $this->tableName . " order by " . $this->bindParams[$this->idField][0];


							//Generate Select By ID
							$selectIdBinds = array($this->bindParams[$this->idField]);
							$this->selectIdQuery = array('SELECT * FROM ' . $this->tableName . ' WHERE ' . $this->bindParams[$this->idField][0] . " = " . $this->bindParams[$this->idField][1], $selectIdBinds);


							//Generate Insert
							$insertBinds = $this->bindParams;
							unset($insertBinds[$this->idField]);
							$this->insertQuery =  array("INSERT INTO " . $this->tableName . "(" . $values . ") VALUES(" . $binds . ")", $insertBinds);
							unset($insertBinds);


							//Generate Update
							// $this->updateQuery = array("UPDATE person SET name = 'Natan Blabla', rg = '000000' WHERE id = 4");
							$updateBinds = $this->bindParams;

							foreach ($updateBinds as $key => $updateBind) {

								if (empty($updateBind[1])) {
									echo $updateBind[1];
									echo "hoy";
								} else {
									// print_r($updateBind);
								}
							}

							$this->updateQuery = array("UPDATE " . $this->tableName . " SET " . "%coluna = %valor" . " WHERE " . $this->bindParams[$this->idField][0] . " = " . $this->bindParams[$this->idField][1], $updateBinds);
							unset($updateBinds);

							// foreach($userdata as $key => $value){
							// 	$sql = $this->db->prepare("UPDATE `users` SET :key = :value WHERE `id` = :userid");
							// 	$sql->bindParam(':key', $key);
							// 	$sql->bindParam(':value', $value);
							// 	$sql->bindParam(':userid', $userid);
							// 	$sql->execute();
							// 	);
							// }


							//Generate Delete
							$deleteBinds = array($this->bindParams[$this->idField]);
							$this->deleteQuery = array("DELETE FROM " . $this->tableName . " WHERE " . $this->bindParams[$this->idField][0] . " = " . $this->bindParams[$this->idField][1], $deleteBinds);
							unset($deleteBinds);
						}
					}
				}
			}

			/*
			// TESTE DE QUERYS
			echo $this->insertQuery;
			echo "\n";
			echo $this->selectAllQuery;
			echo "\n";
			echo $this->updateQuery;
			echo "\n";
			echo $this->dropQuery;			
			*/
		}
	}

	public function get_insertQuery()
	{
		return $this->insertQuery;
	}

	public function get_updateQuery()
	{
		return $this->updateQuery;
	}

	public function get_deleteQuery()
	{
		return $this->deleteQuery;
	}

	public function get_bindParams()
	{
		return $this->bindParams;
	}

	public function get_selectAllQuery()
	{
		return $this->selectAllQuery;
	}

	public function get_selectIdQuery()
	{
		return $this->selectIdQuery;
	}

	public function get_tableName()
	{
		return $this->tableName;
	}

	public function get_idStatus()
	{
		return ($this->bindParams[$this->idField][1] != null) ? true : false;
	}
}
