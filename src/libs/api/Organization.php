<?php
namespace joatis\ControlPanel\libs\api;
use joatis\ControlPanel\libs\database;

class Organization
{
    private $name;
    private $id;

    public function create(Database $db, $data){
        if (!isset($data->name) || empty($data->name)){
            throw new \Exception('Name Required');
        }
        $query = (object)array(
            'table' => 'organization',
            'data' => array(
                'name' => $data->name 
            )
        );
        try {
            $this->id = $db->insert($query);
            $this->name = $data->name;
        } catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}
