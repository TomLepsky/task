<?php

namespace App\Tests;

use App\House\Floor\Flat\Flat;
use App\House\Floor\Flat\FlatFactory;
use App\House\Floor\Flat\Room\RoomFactory;
use App\Observer\PriceDispatcher;
use PHPUnit\Framework\TestCase;

class FlatTest extends TestCase
{
    public function testFlatPrice() : void
    {
        $priceDispatcher = new PriceDispatcher();
        $flat = FlatFactory::makeOneRoomFlat($priceDispatcher, 10, 5);
        $priceDispatcher->setPricePerSquare(10);
        $this->assertEquals(190, $flat->getPrice());
    }

    public function testFlatSquare() : void
    {
        $priceDispatcher = new PriceDispatcher();
        $flat = FlatFactory::makeOneRoomFlat($priceDispatcher, 10, 5);
        $this->assertEquals(19, $flat->getSquare());
    }

    public function testFlatContainsRoom() : void
    {
        $priceDispatcher = new PriceDispatcher();
        $flat = new Flat($priceDispatcher);
        $room = RoomFactory::makeBedroom(12, 1, 1);
        $flat->add($room);
        $this->assertContains($room, $flat->getRooms());
    }

    public function testFlatRoomQty() : void
    {
        $priceDispatcher = new PriceDispatcher();
        $flat = FlatFactory::makeThreeRoomFlat($priceDispatcher, 10, 5, 10);
        $this->assertEquals(3, $flat->getRoomQty());
    }
}