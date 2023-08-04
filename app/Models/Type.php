<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Type extends CoreModel
{
    private $name;
    private $color;

    public function getColor()
    {
        return $this->color;
    }


    public function findAll()
    {
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query(
            "SELECT *
            FROM `type` 
            ORDER BY `name`"
        );
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
