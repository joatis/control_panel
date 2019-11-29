<?php
namespace joatis\ControlPanel;

use PHPUnit\Framework\TestCase;
use joatis\ControlPanel\libs\database\Database;

final class DbTest extends TestCase {
    public function testCanBeCreated()
    {
        $dbConfig = array(
            'host'=>"localhost",
            'type'=>"mysql",
            'name'=>"control_panel",
            'user'=>"test_admin",
            'pass'=>"test_admin"
        );
        $db = new Database($dbConfig);
        $this->assertInstanceOf(
            Database::class,
            $db
        );
    }
}
