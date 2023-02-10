<?php

namespace App\House\Floor\Flat;

use App\House\Floor\Flat\Room\Room;
use App\Observer\PriceObservable;
use App\Observer\PriceObserver;

class Flat implements PriceObserver
{
    /** @var array<Room> */
    protected array $rooms = [];

    protected float $pricePerSquare = 0;

    protected float $totalSquare = 0.0;

    protected int $roomQty = 0;

    public function __construct(protected PriceObservable $priceObservable)
    {
        $this->priceObservable->attach($this);
    }

    public function getPriceObservable(): PriceObservable
    {
        return $this->priceObservable;
    }

    public function setPriceObservable(PriceObservable $priceObservable): void
    {
        $this->priceObservable = $priceObservable;
    }

    public function add(Room $room) : self
    {
        $this->totalSquare += $room->getSquare();
        if ($room->considerAsRoom()) {
            $this->roomQty++;
        }
        $this->rooms[] = $room;
        return $this;
    }

    public function getSquare() : float
    {
        return $this->totalSquare;
    }

    public function getPrice() : float
    {
        return $this->totalSquare * $this->pricePerSquare;
    }

    public function onPriceChanged(float $newPrice): void
    {
        $this->pricePerSquare = $newPrice;
    }

    public function getRoomQty(): int
    {
        return $this->roomQty;
    }

    /**
     * @return array
     */
    public function getRooms(): array
    {
        return $this->rooms;
    }



}