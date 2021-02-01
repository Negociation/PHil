<?php

namespace Services;

use PDO;

class PDOService extends PDO
{

	protected $dbConfig;
	protected $parseFailed;
	protected $conectionFailed;
	public function __construct($configFile = "")
	{

		//If theres no Config File passed then use the default one
		if ($configFile == "") {
			$configFile = dirname(__DIR__, 2) . '\settings.ini';
		}

		//Parse and Validate Config File
		$this->dbConfig = @parse_ini_file($configFile, true);
		$this->parseFailed = is_null($this->dbConfig) ? true : false;

		if (!$this->parseFailed) {
			try {
				parent::__construct("mysql:host=" . $this->dbConfig['database']['host'] . ";dbname=" . $this->dbConfig['database']['name'], $this->dbConfig['database']['user'], $this->dbConfig['database']['password']);
			} catch (PDOException $e) {
				$this->conectionFailed = true;
			}
		}
	}

	public function run($sql, $args = [])
	{
		// print_r($args);
		try {
			$stmt = $this->prepare($sql);
			foreach ($args as $bindParam) {
				$stmt->bindValue($bindParam[0], $bindParam[1]);
			}
			$stmt->execute();
		} catch (Exception $e) {
			$stmt = false;
			exit;
		}
		return $stmt;
	}

	public function getConnectionStatus()
	{
		return ($this->conectionFailed ? false : true);
	}
}
