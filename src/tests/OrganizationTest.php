<?php
namespace joatis\ControlPanel;

use PHPUnit\Framework\TestCase;
use joatis\ControlPanel\libs\api\Organization;
use joatis\ControlPanel\libs\database\Database;

final class OrganizationTest extends TestCase {
    public function testCanBeCreated()
    {
        $org = new Organization;
        $this->assertInstanceOf(
            Organization::class,
            $org
        );
    }

    public function testCreateMissingNameException()
    {
        $data = array(); 
        $org = new Organization;
        $this->expectException("Exception");
        $db = $this->getMockBuilder('joatis\ControlPanel\libs\database\Database')
            ->disableOriginalConstructor()
            ->setMockClassName('joatis\ControlPanel\libs\database\Database')
            ->setMethods(['insert'])
            ->getMock();
        $org->create($db, $data);
    }

    public function testCreateEmptyNameException()
    {
        $data = array('name' => ''); 
        $db = $this->getMockBuilder('joatis\ControlPanel\libs\database\Database')
            ->disableOriginalConstructor()
            ->setMockClassName('joatis\ControlPanel\libs\database\Database')
            ->setMethods(['insert'])
            ->getMock();
        $org = new Organization;
        $this->expectException("Exception");
        $org->create($db, $data);
    }

    public function testCreateTestOrg()
    {
        $data = (object)array('name' => 'TestOrg'); 
        $db = $this->getMockBuilder('joatis\ControlPanel\libs\database\Database')
            ->disableOriginalConstructor()
            ->setMockClassName('joatis\ControlPanel\libs\database\Database')
            ->setMethods(['insert'])
            ->will(1)
            ->getMock();
        $org = new Organization;
        $org->create($db, $data);
    }
}
