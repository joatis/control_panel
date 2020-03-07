<?php
namespace joatis\ControlPanel\libs\database;

class Database {
    private $dbconn;

    /* TODO I should be passing a PDO object to the constructor, so I can mock a db.
    This way couples the PDO DB connection too tightly to the Database class.
    */
    public function __construct($dbConfig){
        $server = "$dbConfig->type:host=$dbConfig->host;port=3306;dbname=$dbConfig->name";
        try {
            $this->dbconn = new \PDO($server, $dbConfig->user, $dbConfig->pass);
        } catch(PDOException $e){
            throw \Exception($e->getMessage() . $server, $e->getCode);
        }
    }

    public function insert($queryObj){
        if(!$queryObj->table){
            throw new \Exception('Missing table.');
        }
        if(!$queryObj->data){
            throw new \Exception('Missing data.');
        }
        if(!is_array($queryObj->data)){
            throw new \Exception('data must be an associative array.');
        }
        
        $tableName = $queryObj->table;
        $columnNames = array_keys($queryObj->data);
        $columns = implode(', ', $columnNames);
        $placeholders = implode(', ', array_map(function($name){ return ":$name";}, $columnNames));
        $sql = "Insert into $tableName ($columns) VALUES ($placeholders)";
        try {
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute($queryObj->data);
            return $this->dbconn->lastInsertId();
        }
        catch(\Exception $e){
            throw $e;
        }
    }
}