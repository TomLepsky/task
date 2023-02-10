<?php

namespace App\House\Floor\Flat;

use App\House\Floor\Flat\Room\RoomFactory;
use App\Observer\PriceDispatcher;
use App\Observer\PriceObservable;

class FlatFactory
{
    public static function makeOneRoomFlat(PriceObservable $priceObservable, float $bedroomSquare, float $kitchenSquare) : Flat
    {
        $bedroom = RoomFactory::makeBedroom($bedroomSquare, 1, 1);
        $kitchen = RoomFactory::makeKitchen($kitchenSquare, 1);
        $bathroom = RoomFactory::makeBathroom(4);

        return (new Flat($priceObservable))
            ->add($bedroom)
            ->add($kitchen)
            ->add($bathroom);
    }

    public static function makeTwoRoomFlat(PriceObservable $priceObservable, float $bedroomSquare, float $kitchenSquare) : Flat
    {
        $bedroom = RoomFactory::makeBedroom($bedroomSquare, 1, 1);
        $kitchen = RoomFactory::makeKitchen($kitchenSquare, 1);
        $bathroom = RoomFactory::makeBathroom(6);

        return (new Flat($priceObservable))
            ->add($bedroom)
            ->add($bedroom)
            ->add($kitchen)
            ->add($bathroom);
    }

    public static function makeThreeRoomFlat(PriceObservable $priceObservable, float $bedroomSquare, float $livingRoom, float $kitchenSquare) : Flat
    {
        $bedroom = RoomFactory::makeBedroom($bedroomSquare, 2, 1);
        $livingRoom = RoomFactory::makeBedroom($livingRoom, 1, 1);
        $kitchen = RoomFactory::makeKitchen($kitchenSquare, 1);
        $bathroom = RoomFactory::makeBathroom(12);

        return (new Flat($priceObservable))
            ->add($bedroom)
            ->add($bedroom)
            ->add($livingRoom)
            ->add($kitchen)
            ->add($bathroom);
    }
}