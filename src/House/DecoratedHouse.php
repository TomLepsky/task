<?php

namespace App\House;

use App\Observer\PriceDispatcher;

abstract class DecoratedHouse implements Aware, House
{
    public function __construct(protected House $house) {}

    public function getDispatcher(): PriceDispatcher
    {
        return $this->house->getDispatcher();
    }

    public function getFloors(): array
    {
        return $this->house->getFloors();
    }
}