<?php
namespace Controllers;

use Services\PessoaDAO;
use DI;

class ControllerTemplate{
	
	
	protected $dbConnection;
	protected $container;
	
	function __construct(){
		$this->container = (new DI\ContainerBuilder())->build();

		//$this->dbConnection = $conn;
	}
	
}


?>