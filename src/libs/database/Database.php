<?php
namespace joatis\ControlPanel\libs\database;

class Database {
    private $dbconn;

    public function _constructor($dbConfig){
        $server = "$dbConfig->type:host=$dbConfig->localhost:dbname=$dbConfig->name";
        $this->dbconn = new PDO($server, $dbConfig->user, $dbConfig->password);
    }
}