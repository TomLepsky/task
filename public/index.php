<?php

use App\Specification\{AndSpecification, ApartmentHouseSpecification, CivilHouseSpecification};
use App\House\{Floor\Flat\FlatFactory,
    Floor\FloorFactory,
    HouseBuilder,
    HouseWithElevator,
    HouseWithLighting};
use App\Observer\PriceDispatcher;

require_once dirname(__DIR__).'/vendor/autoload.php';

$priceDispatcher = new PriceDispatcher();
$floor = FloorFactory::makeSmallFloor($priceDispatcher,3, 2);
$bigFloor = FloorFactory::makeSmallFloor($priceDispatcher, 3, 3);
$flat = FlatFactory::makeThreeRoomFlat($priceDispatcher, 15, 20, 5);
$bigFloor
    ->add($flat)
    ->add($flat);
$priceDispatcher->setPricePerSquare(23);

$livingHouseSpec = new AndSpecification(new ApartmentHouseSpecification(10), new CivilHouseSpecification(4));
$house = (new HouseBuilder($priceDispatcher, $livingHouseSpec))
    ->addFloor($bigFloor)
    ->addFloor($floor)
    ->addFloor($floor)
    ->addFloor($floor)
    ->getHouse();
$house = new HouseWithLighting(new HouseWithElevator($house));

echo "<pre>";
print_r($house->info());
echo "</pre>";

