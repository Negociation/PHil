<?php

namespace Services;

class DAOService{
	
	private $dbConnection;
	
	function __construct($dbConnection){
		
		$this->dbConnection = $dbConnection;
		
		echo "oi";
	}
	
	/* SELECTS */
	
	protected function getAll($table){	
		try {
			$sql = 'SELECT * FROM .'.$table.' order by id';
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}
		return $result;
	}
	
	protected function getByParam($table,$column,$param){
		try {
			$sql = 'SELECT * FROM .'.$table.' where '.$column.' = :param';
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindValue(':param', $param);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}
		return $result;	
	}
	
	protected function getById($table,$id){
		try {
			$sql = 'SELECT * FROM '.$table.' WHERE id = :id';
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$result = $stmt->fetch();
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}		
		return $result;		
	}


	
	/* INSERTS */
	
	/* UPDATES */
	
	/* DROP */
	
	
}


?>