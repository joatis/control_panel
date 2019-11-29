<?php
namespace joatis\ControlPanel;

use PHPUnit\Framework\TestCase;
use joatis\ControlPanel\libs\Config;
const CONFIG_JSON_PATH = __DIR__ . "/../config.json";

final class ConfigTest extends TestCase {
    public function testCanBeCreated()
    {
        $config = new Config(CONFIG_JSON_PATH);
        $this->assertInstanceOf(
            Config::class,
            $config
        );
    }
    public function testHasDatabaseInfo()
    {
        $config = new Config(CONFIG_JSON_PATH);
        $dbInfo = $config->get('database');
        $this->assertNotNull($dbInfo);
        $this->assertArrayHasKey('host', (array) $dbInfo);
        $this->assertArrayHasKey('type', (array) $dbInfo);
        $this->assertArrayHasKey('name', (array) $dbInfo);
        $this->assertArrayHasKey('user', (array) $dbInfo);
        $this->assertArrayHasKey('pass', (array) $dbInfo);
    }
}
