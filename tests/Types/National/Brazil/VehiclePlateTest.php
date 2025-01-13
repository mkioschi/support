<?php

namespace Mkioschi\Support\Tests\Types\National\Brazil;

use Mkioschi\Support\Types\National\Brazil\VehiclePlate;
use PHPUnit\Framework\TestCase;

class VehiclePlateTest extends TestCase
{
    public function test_should_be_able_to_create_a_valid_vehicle_plate()
    {
        $this->assertInstanceOf(VehiclePlate::class, VehiclePlate::from('ABC1234'));
        $this->assertTrue(VehiclePlate::isValid('ABC1234'));
        $this->assertTrue(VehiclePlate::isValid('ABC1X34'));
    }
}