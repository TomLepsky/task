<?php

namespace App\House;

use Exception;

class HouseWithElevator extends DecoratedHouse implements Aware, House
{
    public function __construct(House $house)
    {
        parent::__construct($house);
        $this->getDispatcher()->addMultiplierPerSquare(1.5);
    }

    /**
     * @throws Exception
     */
    public function info(): array
    {
        $info = $this->house->info();
        $info['options'][] = 'elevator';
        return $info;
    }
}