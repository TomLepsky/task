<?php

namespace App\Specification;

use App\House\House;

interface Specification
{
    public function isSatisfied(House $house) : bool;
}