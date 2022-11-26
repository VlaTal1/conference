<?php
namespace Conference\Database;
use PDO;

//class for working with database
class DB{
    private $pdo;

    public function __construct(){
        // getting database info to work with
        $dbinfo = require 'dbinfo.php';
        // connecting to the database
        $this->pdo = new PDO('mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'], $dbinfo['login'], $dbinfo['password']);
    }

    public function query($sql, $params = []){
        $statement = $this->pdo->prepare($sql); // preparing statement
        $result = $statement->execute($params); // executing a prepared statement

        if ($result != false)
            return $statement->fetchAll(PDO::FETCH_ASSOC); // returning remaining rows

        return null;
    }

    //get all rows from db
    public function getAll($table, $sql = '', $params = []){
        return $this->query('SELECT * FROM ' . $table . ' ' . $sql, $params);
    }

    //get one row from db with id
    public function getOneById($table, $id, $params = []){
        return $this->query("SELECT * FROM $table WHERE id_conference = $id")[0];
    }
}