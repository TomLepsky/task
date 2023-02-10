<?php

namespace App\House;

use App\House\Floor\Floor;
use App\Observer\PriceDispatcher;
use Exception;

class SimpleHouse implements Aware, House
{
    /** @var array<Floor>  */
    protected array $floors = [];

    public function __construct(protected PriceDispatcher $dispatcher) {}

    public function add(Floor $floor) : SimpleHouse
    {
        $this->floors[] = $floor;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function info(): array
    {
        $info = [];
        $info['summary']['price'] = 0;
        foreach ($this->floors as $floor) {
            $floorInfo = $floor->info();
            $info['floors'][] = $floorInfo['summary'];

            foreach ($floorInfo['summary'] as $key => $value) {
                $info['summary'][$key] = isset($info['summary'][$key]) ? $info['summary'][$key] + $value : $value;
            }

            foreach ($floorInfo['rooms'] as $room) {
                $info['summary']['price'] += $room['price'];
            }
        }
        return $info;
    }

    public function getDispatcher(): PriceDispatcher
    {
        return $this->dispatcher;
    }

    public function getFloors(): array
    {
        return $this->floors;
    }
}