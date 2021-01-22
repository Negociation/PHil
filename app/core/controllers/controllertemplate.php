<?php

namespace Controllers;

use Services\PessoaDAO;


class ControllerTemplate
{
	protected $dbConnection;

	function __construct($conn)
	{
		$this->dbConnection = $conn;
	}
}
