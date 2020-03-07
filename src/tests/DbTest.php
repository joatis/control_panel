<?php
namespace joatis\ControlPanel;

use PHPUnit\Framework\TestCase;
use joatis\ControlPanel\libs\database\Database;

final class DbTest extends TestCase {
    public function testCanBeCreated()
    {
        $dbConfig = (object)array(
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

    public function testCanInsertOrganization(){
        $dbConfig = (object)array(
            'host'=>"localhost",
            'type'=>"mysql",
            'name'=>"control_panel",
            'user'=>"test_admin",
            'pass'=>"test_admin"
        );
        $db = new Database($dbConfig);
        $query = (object)array(
            'table' => 'organization',
            'data' => array(
                'name' => 'test organization' 
            )
        );
        try {
            $orgId = $db->insert($query);
            $this->assertNotNull($orgId);
        }
        catch (\Exception $e){
            throw $e;
        }
    }
}
