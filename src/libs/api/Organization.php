<?php
namespace joatis\ControlPanel\libs\api;

class Organization
{

    public function create($data){
        if (!isset($data->name) || empty($data->name)){
            throw new \Exception('Name Required');
        }
        return $data;
    }
}
