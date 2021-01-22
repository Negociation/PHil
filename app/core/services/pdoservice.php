<?php

namespace Services;

use PDO;

class PDOService extends PDO{


	protected $dbConfig;
	protected $parseFailed;
	protected $conectionFailed;
    public function __construct($configFile = ""){
		
		//If theres no Config File passed then use the default one
		if($configFile == ""){
			$configFile = dirname(__DIR__,1).'\settings.ini';
		}
		

		//Parse and Validate Config File
		
		$this->dbConfig = @parse_ini_file($configFile, true);
		$this->parseFailed = is_null($this->dbConfig) ? true : false;
		
		

		if(!$this->parseFailed){
			try {
			parent::__construct("mysql:host=".$this->dbConfig['database']['host'].";dbname=".$this->dbConfig['database']['name'], $this->dbConfig['database']['user'], $this->dbConfig['database']['password']);
			
			}catch(PDOException $e){
				$this->conectionFailed = true;
			}
		}
    }
	
	public function run($sql, $args = NULL) {
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
	
	public function getConnectionStatus(){
		return ($this->conectionFailed ? false : true);
	}
}


?>