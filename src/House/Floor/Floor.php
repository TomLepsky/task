<?php

namespace App\House\Floor;

use App\House\Aware;
use App\House\Floor\Flat\Flat;

class Floor implements Aware
{
    /** @var array<Flat> */
    protected array $flats = [];

    public function add(Flat $flat) : self
    {
        $this->flats[] = $flat;
        return $this;
    }

    public function info() : array
    {
        $info = [];
        foreach ($this->flats as $flat) {
            $roomQty = $flat->getRoomQty();
            $info['summary']["$roomQty-flat_rooms_qty"] =
                    isset($info['summary']["$roomQty-flat_rooms_qty"]) ?
                    ++$info['summary']["$roomQty-flat_rooms_qty"] : 1;
            $info['rooms'][] = [
                'roomsQty' => $flat->getRoomQty(),
                'square' => $flat->getSquare(),
                'price' => $flat->getPrice()
            ];
        }

        return $info;
    }

    /**
     * @return array
     */
    public function getFlats(): array
    {
        return $this->flats;
    }
}