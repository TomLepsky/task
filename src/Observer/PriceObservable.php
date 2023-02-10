<?php

namespace App\Observer;

interface PriceObservable
{
    public function attach(PriceObserver $observer) : void;

    public function notify(float $newPrice) : void;
}