<?php
namespace joatis\ControlPanel;
const CONFIG_JSON_PATH = "../config.json";
require_once $CONFIG_JSON_PATH;

class Config {
    private static $config = null;

    public static function getConfig() {
        if (\isNull(this::$config)){
            this::$config = json_decode($CONFIG_JSON_PATH);
        }
        else {
            return this::$config;
        }
    }
}