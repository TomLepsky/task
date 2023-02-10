<?php

namespace App\Tests;

use App\House\Floor\FloorFactory;
use App\House\HouseBuilder;
use App\House\SimpleHouse;
use App\Observer\PriceDispatcher;
use App\Specification\AndSpecification;
use App\Specification\ApartmentHouseSpecification;
use App\Specification\CivilHouseSpecification;
use PHPUnit\Framework\TestCase;

class HouseTest extends TestCase
{
    public function testHouseMinQtyFloors() : void
    {
        $priceDispatcher = new PriceDispatcher();
        $floor = FloorFactory::makeSmallFloor($priceDispatcher,1, 1);
        $livingHouseSpec = new AndSpecification(new ApartmentHouseSpecification(10), new CivilHouseSpecification(4));
        $house = (new HouseBuilder($priceDispatcher, $livingHouseSpec))
            ->addFloor($floor)
            ->addFloor($floor)
            ->addFloor($floor)
            ->addFloor($floor)
            ->getHouse();
        $this->assertInstanceOf(SimpleHouse::class, $house);
    }
}