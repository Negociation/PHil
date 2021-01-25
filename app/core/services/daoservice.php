<?php

namespace Services;

use PDO;
use DI;

class DAOService{
	
	private $dbConnection;
	
	function __construct(PDOService $dbConnection){
		
		$this->dbConnection = $dbConnection;
	}
	
	/* SELECTS */
	
	protected function getAll($table){	
		try {
			$sql = 'SELECT * FROM .'.$table.' order by id';
			$stmt = $this->dbConnection->run($sql);
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

	/* INSERT */
	
	
	/* UPDATE */
	
	
	/* DROP */
	protected function drop($table, $id)
	{
		$sql = 'DELETE FROM' . $table . 'WHERE id = :id';

		try {
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindValue('id', $id);
			$stmt->execute();
		} catch(Exception $e){
			return false;
		}
		return true;
	}	
	
}


?>