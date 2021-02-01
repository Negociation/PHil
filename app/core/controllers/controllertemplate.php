<?php

namespace Controllers;

use Services\PessoaDAO;
use DI;

class ControllerTemplate
{


	protected $httpInput;
	protected $dbConnection;
	protected $container;

	function __construct()
	{
		$this->container = (new DI\ContainerBuilder())->build();

		$this->httpInput = file_get_contents('php://input');
	}
}
