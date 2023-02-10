<?php

namespace App\House\Floor\Flat\Room;

interface Room
{
    public function getSquare() : float;

    public function getPrice() : int;

    public function getOptions() : array;

    public function considerAsRoom() : bool;
}