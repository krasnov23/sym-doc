<?php

namespace App\Exceptions;

use Exception;


class TripNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("cant find trip with this parameter");
    }
}