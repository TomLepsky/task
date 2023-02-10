<?php

namespace App\House\Floor\Flat\Room;

abstract class DecoratedRoom implements Room
{
    public function __construct(protected Room $room, protected float $decorPrice) {}

    public function getSquare(): float
    {
        return $this->room->getSquare();
    }
}