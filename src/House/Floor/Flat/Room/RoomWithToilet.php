<?php

namespace App\House\Floor\Flat\Room;

class RoomWithToilet extends DecoratedRoom implements Room
{
    public function __construct(Room $room, float $decorPrice = 2)
    {
        parent::__construct($room, $decorPrice);
    }

    public function getPrice(): int
    {
        return $this->room->getPrice() + $this->decorPrice;
    }

    public function getOptions(): array
    {
        $opt = $this->room->getOptions();
        $opt[] = 'toilet';
        return $opt;
    }

    public function considerAsRoom(): bool
    {
        return false;
    }
}