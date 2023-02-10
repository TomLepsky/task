<?php

namespace App\House;

use App\House\Floor\Floor;
use App\Observer\PriceObservable;
use App\Specification\Specification;
use Exception;

class HouseBuilder
{
    protected House $house;
    public function __construct(protected PriceObservable $observable, protected ?Specification $specification = null)
    {
        $this->house = new SimpleHouse($this->observable);
    }

    public function addFloor(Floor $floor) : self
    {
        $this->house->add($floor);
        return $this;
    }

    /**
     * @throws Exception
     */
    public function getHouse() : House
    {
        if ($this->specification !== null && !$this->specification->isSatisfied($this->house)) {
            throw new Exception("House doesn't match the specification");
        }
        return $this->house;
    }
}