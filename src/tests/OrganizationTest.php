<?php
namespace joatis\ControlPanel;

use PHPUnit\Framework\TestCase;
use joatis\ControlPanel\libs\api\Organization;

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
        $org->create($data);
    }

    public function testCreateEmptyNameException()
    {
        $data = array('name' => ''); 
        $org = new Organization;
        $this->expectException("Exception");
        $org->create($data);
    }

    public function testCreateTestOrg()
    {
        $data = array('name' => 'TestOrg'); 
        $org = new Organization;
        $org->create($data);
    }
}
