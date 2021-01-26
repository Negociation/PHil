<?php

namespace Services;

<<<<<<< Updated upstream
=======
use PDO;
use DI;
use Models;
use Annotations;
use Doctrine\Common\Annotations\AnnotationReader;
>>>>>>> Stashed changes
use Exception;

class DAOService
{
<<<<<<< Updated upstream
	private $dbConnection;

	function __construct($dbConnection)
	{
		$this->dbConnection = $dbConnection;
	}

	/* SELECTS */
	protected function getAll($table)
	{
		try {
			$sql = 'SELECT * FROM .' . $table . ' order by id';
			$stmt = $this->dbConnection->run($sql);
			$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
=======

	private $dbConnection;
	private $annotationReader;

	function __construct(PDOService $dbConnection)
	{

		$this->dbConnection = $dbConnection;

		$this->insert(null);
	}

	/* SELECTS */

	protected function getAll($table)
	{
		try {
			$sql = 'SELECT * FROM .' . $table . ' ORDER BY id';
			$stmt = $this->dbConnection->run($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> Stashed changes
		} catch (Exception $e) {
			//If not return false
			return false;
			exit;
		}
		return $result;
	}

	protected function getByParam($table, $column, $param)
	{
		try {
<<<<<<< Updated upstream
			$sql = 'SELECT * FROM .' . $table . ' where ' . $column . ' = :param';
=======
			$sql = 'SELECT * FROM .' . $table . ' WHERE ' . $column . ' = :param';
>>>>>>> Stashed changes
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindValue(':param', $param);
			$stmt->execute();

<<<<<<< Updated upstream
			$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
=======
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> Stashed changes
		} catch (Exception $e) {
			//If not return false
			return false;
			exit;
		}
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
		return $result;
	}

	protected function getById($table, $id)
	{
		try {
			$sql = 'SELECT * FROM ' . $table . ' WHERE id = :id';
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
<<<<<<< Updated upstream

			$result = $stmt->fetch(\PDO::FETCH_ASSOC);
=======
			$result = $stmt->fetch();
>>>>>>> Stashed changes
		} catch (Exception $e) {
			//If not return false
			return false;
			exit;
		}
<<<<<<< Updated upstream

		return $result;
	}

	/* INSERTS */
	// @TODO Ficou especializado demais (?)
	protected function create($obj)
	{
		$sql = 'INSERT INTO naturalperson(name, cpf, rg, uuid) VALUES (:name, :cpf, :rg, :uuid)';

		try {
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindValue('name',  $obj->name);
			$stmt->bindValue('cpf', $obj->cpf);
			$stmt->bindValue('rg', $obj->rg);
			$stmt->bindValue('uuid', md5(uniqid(rand(), true)));	//valor único gerado automaticamente;

			$stmt->execute();
		} catch (Exception $e) {
			return false;
		}
		return true;
	}

	/* UPDATES */
	// @TODO Ficou especializado demais (?)
	protected function update($obj)
	{
		$sql = 'UPDATE naturalperson SET name = :name, cpf = :cpf, rg = :rg, uuid = :uuid WHERE id = :id';

		try {
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindValue('name',  $obj->name);
			$stmt->bindValue('cpf', $obj->cpf);
			$stmt->bindValue('rg', $obj->rg);
			$stmt->bindValue('uuid', $obj->uuid);
			$stmt->bindValue('id', $obj->id);

			$stmt->execute();
		} catch (Exception $e) {
			return false;
		}
		return true;
	}
=======
		return $result;
	}

	/* INSERT */
	protected function insert($classObject)
	{
		// $classObject = new Models\NaturalPerson(); /* objeto de teste, excluir depois */

		$queryObject = new QueryService($classObject);

		return $this->dbConnection->run($queryObject->get_insertQuery(), $queryObject->get_bindParams());
	}

	/* UPDATE */

>>>>>>> Stashed changes

	/* DROP */
	protected function delete($table, $id)
	{
		$sql = 'DELETE FROM' . $table . 'WHERE id = :id';

		try {
			$stmt = $this->dbConnection->prepare($sql);
			$stmt->bindValue('id', $id);

			$stmt->execute();
		} catch (Exception $e) {
			return false;
		}
		return true;
	}
}
