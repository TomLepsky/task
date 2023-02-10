<?php

namespace App\House;

use Exception;

class HouseWithLighting extends DecoratedHouse implements Aware, House
{
    public function __construct(House $house)
    {
        parent::__construct($house);
        $this->getDispatcher()->addMultiplierPerSquare(2);
    }

    /**
     * @throws Exception
     */
    public function info(): array
    {
        $info = $this->house->info();
        $info['options'][] = 'lighting';
        return $info;
    }
}