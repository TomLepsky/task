<?php

namespace App\Specification;

use App\House\House;

class ApartmentHouseSpecification implements Specification
{
    public function __construct(protected int $floorQty) {}

    public function isSatisfied(House $house): bool
    {
        $qty = count($house->getFloors());
        return $qty <= $this->floorQty;
    }
}