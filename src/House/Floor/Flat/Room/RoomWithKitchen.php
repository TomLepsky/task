<?php

namespace App\House\Floor\Flat\Room;

class RoomWithKitchen extends DecoratedRoom implements Room
{
    public function __construct(Room $room, float $decorPrice = 15)
    {
        parent::__construct($room, $decorPrice);
    }

    public function getPrice(): int
    {
        return $this->room->getPrice() + $this->getSquare() * $this->decorPrice;
    }

    public function getOptions(): array
    {
        $opt = $this->room->getOptions();
        $opt[] = 'kitchen';
        return $opt;
    }

    public function considerAsRoom(): bool
    {
        return false;
    }
}