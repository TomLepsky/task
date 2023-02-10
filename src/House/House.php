<?php

namespace App\House;

use App\Observer\PriceDispatcher;

interface House
{
    public function getDispatcher(): PriceDispatcher;

    public function getFloors(): array;
}