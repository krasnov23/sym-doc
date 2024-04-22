<?php

namespace App\Model;

class PassengerInfoModel
{

    private int $id;

    private string $fullName;

    private string $passportData;

    private int $seatNumber;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getPassportData(): string
    {
        return $this->passportData;
    }

    public function setPassportData(string $passportData): self
    {
        $this->passportData = $passportData;

        return $this;
    }

    public function getSeatNumber(): int
    {
        return $this->seatNumber;
    }

    public function setSeatNumber(int $seatNumber): self
    {
        $this->seatNumber = $seatNumber;

        return $this;
    }



}