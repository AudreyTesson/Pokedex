<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;
use Pokedex\Models\Type;

class Pokemon extends CoreModel
{

    private $name;
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;

    public function findAll()
    {
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query(
            "SELECT * 
            FROM `pokemon` 
            ORDER BY `number`"
        );
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Pokemon::class);
    }

    public function find($number)
    {
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query(
            "SELECT * 
            FROM `pokemon`
            WHERE `number` = {$number}"
        );
        return $pdoStatement->fetchObject(Pokemon::class);
    }

    public function findByType($typeId)
    {
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query(
            "SELECT *
            FROM `pokemon` 
            INNER JOIN `pokemon_type` ON `pokemon_type`.`pokemon_number` = `pokemon`.`number`
            WHERE `pokemon_type`.`type_id` = {$typeId}
            ORDER BY `pokemon`.`number`"
        );
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Pokemon::class);
    }

    public function getTypes()
    {
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query(
            "SELECT `type`.*
            FROM `pokemon_type`
            INNER JOIN `type` ON `type`.`id` = `pokemon_type`.`type_id`
            WHERE `pokemon_type`.`pokemon_number` = {$this->getNumber()}"
        );
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of hp
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Get the value of attack
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Get the value of defense
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Get the value of spe_attack
     */
    public function getSpeAttack()
    {
        return $this->spe_attack;
    }

    /**
     * Get the value of spe_defense
     */
    public function getSpeDefense()
    {
        return $this->spe_defense;
    }

    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the value of speed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

}
