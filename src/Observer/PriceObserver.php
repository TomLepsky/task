<?php

namespace App\Observer;

interface PriceObserver
{
    public function onPriceChanged(float $newPrice) : void;
}