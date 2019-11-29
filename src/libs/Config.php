<?php
namespace joatis\ControlPanel\libs;

class Config {
    private $config = null;

    public function __construct($config_path) {
        $json = file_get_contents($config_path);
        $this->config = json_decode($json);
    }

    public function get($key){
        return $this->config->$key;
    }
    public function set($key, $val){
        $this->config->$key = $val;
    }
}