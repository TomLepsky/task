<?php

namespace App\House\Floor\Flat\Room;

class RoomFactory
{
    public static function makeBathroom(float $square) : Room
    {
        return new RoomWithDoor(new RoomWithTile(new RoomWithToilet(new RoomWithBath(new EmptyRoom($square)))));
    }

    public static function makeBedroom(float $square, int $windowAmount, int $doorAmount) : Room
    {
        $room = new RoomWithParquet(new EmptyRoom($square));
        for ($i = 0; $i < $windowAmount; $i++) {
            $room = new RoomWithWindow($room);
        }

        for ($i = 0; $i < $doorAmount; $i++) {
            $room = new RoomWithDoor($room);
        }

        return $room;
    }

    public static function makeKitchen(float $square, int $windowAmount) : Room
    {
        $room = new RoomWithKitchen(new RoomWithTile(new EmptyRoom($square)));
        for ($i = 0; $i < $windowAmount; $i++) {
            $room = new RoomWithWindow($room);
        }

        return $room;
    }
}