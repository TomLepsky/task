<?php

namespace App\Specification;

use App\House\House;

class AndSpecification implements Specification
{
    /** @var array<Specification> */
    protected array $specs;

    public function __construct(Specification ...$specification)
    {
        $this->specs = $specification;
    }
    public function isSatisfied(House $house): bool
    {
        foreach ($this->specs as $spec) {
            if (!$spec->isSatisfied($house)) {
                return false;
            }
        }

        return true;
    }
}