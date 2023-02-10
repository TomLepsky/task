<?php

namespace App\House\Floor\Flat\Room;

class RoomWithDoor extends DecoratedRoom implements Room
{
    public function __construct(Room $room, float $decorPrice = 5)
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
        $opt[] = 'door';
        return $opt;
    }

    public function considerAsRoom(): bool
    {
        return $this->room->considerAsRoom();
    }
}
