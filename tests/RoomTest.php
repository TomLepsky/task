<?php

namespace App\Tests;

use App\House\Floor\Flat\Room\{EmptyRoom, RoomWithBath, RoomWithParquet};
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    public function testRoomWithBathSquare() : void
    {
        $room = new RoomWithBath(new EmptyRoom(10));
        $this->assertEquals(10, $room->getSquare());
    }

    public function testRoomWithParquetToConsiderAsRoom() : void
    {
        $room = new RoomWithParquet(new EmptyRoom(10));
        $this->assertTrue($room->considerAsRoom());
    }

    public function testRoomWithBathToConsiderAsNotRoom() : void
    {
        $room = new RoomWithBath(new EmptyRoom(10));
        $this->assertFalse($room->considerAsRoom());
    }
}