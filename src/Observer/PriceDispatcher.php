<?php

namespace App\Observer;


class PriceDispatcher implements PriceObservable
{
    /** @var array<PriceObserver> */
    private array $observers = [];

    private float $price = 0;

    private float $multiplier = 1;

    public function attach(PriceObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function notify(float $newPrice): void
    {
        foreach ($this->observers as $observer) {
            $observer->onPriceChanged($newPrice);
        }
    }

    public function addMultiplierPerSquare(float $multiplier) : void
    {
        $this->multiplier *= $multiplier;
        $this->notify($this->price * $this->multiplier);
    }

    public function setPricePerSquare(float $price) : void
    {
        $this->price = $price;
        $this->notify($price * $this->multiplier);
    }
}