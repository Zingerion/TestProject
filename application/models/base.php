<?php

namespace fb\classes;

use fb\config\Config;
use PDO;

abstract class Base extends Config
{
    public $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=" . Config::$host . ";dbname=" . Config::$database, Config::$user,
            Config::$password);
    }

    public function select($cols, $table, $condition)
    {
        $sql = "SELECT " . $cols . " FROM " . $table . " WHERE " . $condition;
        //echo $sql;
        return $this->db->query($sql)->fetchAll();
    }

    public function insert($table, $values)
    {
        $sql = "INSERT INTO " . $table . ' VALUES (' . $values . ")";
        $this->db->query($sql)->fetchAll();
    }

    public function update($table, $values, $condition)
    {
        $sql = "UPDATE " . $table . " SET (" . $values . ") WHERE " . $condition;
    }
}
