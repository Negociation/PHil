<?php

namespace src\Model;

use src\Database\Connection;

class NaturalPersonDAO
{
    public function create(NaturalPerson $p)
    {
        $query = 'INSERT INTO naturalperson (name, cpf, rg, uuid) VALUES (?, ?, ?, ?)';

        $st = Connection::getConnection()->prepare($query);

        $st->bindValue(1, $p->getCompleteName());
        $st->bindValue(2, $p->getCPF());
        $st->bindValue(3, $p->getRG());
        $st->bindValue(4, $p->getUUID());

        $st->execute();

        // $query = "INSERT INTO naturalperson (name, cpf, rg, uuid) VALUES ('{$p->getCompleteName()}', '{$p->getCPF()}', '{$p->getRG()}', '{$p->getUUID()}')";
        // try {
        //     Connection::getConnection()->beginTransaction();
        //     Connection::getConnection()->exec($query);
        //     Connection::getConnection()->commit();
        // } catch (Exception $e) {
        //     Connection::getConnection()->rollBack();
        //     echo $e->getMessage();
        // }
    }

    public function readID($id)
    {
        $query = 'SELECT * FROM naturalperson WHERE id = ?';

        $st = Connection::getConnection()->prepare($query);

        $st->bindValue(1, $id);

        $st->execute();

        if ($st->rowCount() > 0) {
            $result = $st->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }

        return [];
    }

    public function readCPF($cpf)
    {
        $query = 'SELECT * FROM naturalperson WHERE id = ?';

        $st = Connection::getConnection()->prepare($query);

        $st->bindValue(1, $cpf);

        $st->execute();

        if ($st->rowCount() > 0) {
            $result = $st->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }

        return [];
    }

    public function readAll()
    {
        $query = 'SELECT * FROM naturalperson';

        $st = Connection::getConnection()->prepare($query);

        $st->execute();

        if ($st->rowCount() > 0) {
            $result = $st->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        return [];
    }

    public function update(NaturalPerson $p, $id)
    {
        $query = 'UPDATE naturalperson SET name = ?, cpf = ?, rg = ?, uuid = ? WHERE id = ?';

        print_r($p);
        $st = Connection::getConnection()->prepare($query);

        $st->bindValue(1, $p->getCompleteName());
        $st->bindValue(2, $p->getCPF());
        $st->bindValue(3, $p->getRG());
        $st->bindValue(4, $p->getUUID());
        $st->bindValue(5, $id);

        $st->execute();
    }

    public function delete($id)
    {
        $query = 'DELETE FROM naturalperson WHERE id = ?';

        $st = Connection::getConnection()->prepare($query);

        $st->bindValue(1, $id);

        $st->execute();
    }
}
