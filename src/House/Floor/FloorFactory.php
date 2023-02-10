<?php

namespace App\House\Floor;

use App\House\Floor\Flat\Flat;
use App\House\Floor\Flat\FlatFactory;
use App\Observer\PriceObservable;

class FloorFactory
{
    public static function makeSmallFloor(PriceObservable $priceObservable, int $oneRoomQty, int $twoRoomQty) : Floor
    {
        /** @var array<Flat> $rooms */
        $rooms = [];
        for ($i = 0; $i < $oneRoomQty; $i++) {
            $rooms[] = FlatFactory::makeOneRoomFlat($priceObservable, 6, 14, 5);
        }

        for ($i = 0; $i < $twoRoomQty; $i++) {
            $rooms[] = FlatFactory::makeTwoRoomFlat($priceObservable, 8, 16, 6);
        }

        $floor = new Floor();
        foreach ($rooms as $room) {
            $floor->add($room);
        }
        return $floor;
    }
}