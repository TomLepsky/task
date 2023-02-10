<?php

namespace App\Tests;

use App\House\Floor\Flat\FlatFactory;
use App\House\Floor\Floor;
use App\House\Floor\FloorFactory;
use App\Observer\PriceDispatcher;
use PHPUnit\Framework\TestCase;

class FloorTest extends TestCase
{
    public function testFloorQtyFlats() : void
    {
        $priceDispatcher = new PriceDispatcher();
        $floor = FloorFactory::makeSmallFloor($priceDispatcher, 2, 4);
        $this->assertCount(6, $floor->getFlats());
    }

    public function testFloorContainsFlat() : void
    {
        $priceDispatcher = new PriceDispatcher();
        $flat = FlatFactory::makeOneRoomFlat($priceDispatcher, 10, 5);
        $floor = new Floor();
        $floor->add($flat);
        $this->assertContains($flat, $floor->getFlats());
    }
}