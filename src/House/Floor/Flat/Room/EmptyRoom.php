<?php

namespace App\House\Floor\Flat\Room;

class EmptyRoom implements Room
{
    public function __construct(protected float $square) {}

    public function getPrice(): int
    {
        return 0;
    }

    public function getSquare(): float
    {
        return $this->square;
    }

    public function getOptions(): array
    {
        return [];
    }

    public function considerAsRoom(): bool
    {
        return true;
    }
}