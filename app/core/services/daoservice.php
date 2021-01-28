<?php

namespace Services;

use PDO;

use function PHPSTORM_META\type;

class DAOService
{

	private $dbConnection;

	function __construct(PDOService $dbConnection)
	{
		$this->dbConnection = $dbConnection;
	}

	/* SELECTS */

	protected function getAll($classObject)
	{
		$queryObject = new QueryService($classObject);

		$result = $this->dbConnection->run($queryObject->get_selectAllQuery())->fetchAll(PDO::FETCH_ASSOC);

		return (is_array($result) ? $result : false);
	}

	protected function getByParam($classObject, $param)
	{
		try {
			$sql = 'SELECT * FROM .' . $table . ' where ' . $column . ' = :param';
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindValue(':param', $param);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (\Exception $e) {
			//If not return false
			return false;
			exit;
		}
		return $result;
	}

	protected function getById($classObject)
	{
		$queryObject = new QueryService($classObject);

		$result = $this->dbConnection->run($queryObject->get_selectIdQuery()[0], $queryObject->get_selectIdQuery()[1])->fetch(PDO::FETCH_ASSOC);

		return (is_array($result) ? $result : false);
	}

	/* INSERT */
	protected function insert($classObject)
	{
		$queryObject = new QueryService($classObject);

		$result = $this->dbConnection->run($queryObject->get_insertQuery()[0], $queryObject->get_insertQuery()[1]);

		return (is_array($result) ? $result : false);
	}

	/* UPDATE */
	protected function update($classObject)
	{
		$queryObject = new QueryService($classObject);

		$result = $this->dbConnection->run($queryObject->get_updateQuery()[0], $queryObject->get_updateQuery()[1]);

		return (is_array($result) ? $result : false);
	}

	/* DELETE */
	protected function delete($classObject)
	{
		$queryObject = new QueryService($classObject);

		print_r($queryObject->get_deleteQuery());

		$result = $this->dbConnection->run($queryObject->get_deleteQuery()[0], $queryObject->get_deleteQuery()[1]);

		return (is_array($result) ? $result : false);
	}
}
