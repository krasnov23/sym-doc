<?php

namespace App\Model;

class TripResponse
{

    public function __construct(private array $trips)
    {
    }

    public function getTrips(): array
    {
        return $this->trips;
    }


}