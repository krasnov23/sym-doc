<?php

namespace App\Handler;

class ExceptionMappingModel
{
    public function __construct(private int $code,private bool $hidden,private bool $loggable)
    {
    }


    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function isHidden(): bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    public function isLoggable(): bool
    {
        return $this->loggable;
    }

    public function setLoggable(bool $loggable): void
    {
        $this->loggable = $loggable;
    }


}