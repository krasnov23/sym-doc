<?php

namespace App\Model;

use DateTimeImmutable;

class TripModel
{
    private int $id;

    private string $departurePlace;

    private string $arrivalPlace;

    private DateTimeImmutable $dateOfDepartures;

    private int $seatsAmount;

    private string $driverName;

    private BusInfoModel $busInfo;

    private array $passengers;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDeparturePlace(): string
    {
        return $this->departurePlace;
    }

    public function setDeparturePlace(string $departurePlace): self
    {
        $this->departurePlace = $departurePlace;

        return $this;
    }

    public function getArrivalPlace(): string
    {
        return $this->arrivalPlace;
    }

    public function setArrivalPlace(string $arrivalPlace): self
    {
        $this->arrivalPlace = $arrivalPlace;

        return $this;
    }

    public function getDateOfDepartures(): DateTimeImmutable
    {
        return $this->dateOfDepartures;
    }

    public function setDateOfDepartures(DateTimeImmutable $dateOfDepartures): self
    {
        $this->dateOfDepartures = $dateOfDepartures;

        return $this;
    }

    public function getSeatsAmount(): int
    {
        return $this->seatsAmount;
    }

    public function setSeatsAmount(int $seatsAmount): self
    {
        $this->seatsAmount = $seatsAmount;

        return $this;
    }

    public function getDriverName(): string
    {
        return $this->driverName;
    }

    public function setDriverName(string $driverName): self
    {
        $this->driverName = $driverName;

        return $this;
    }

    public function getBusInfo(): BusInfoModel
    {
        return $this->busInfo;
    }

    public function setBusInfo(BusInfoModel $busInfo): self
    {
        $this->busInfo = $busInfo;

        return $this;
    }

    public function getPassengers(): array
    {
        return $this->passengers;
    }

    public function setPassengers(array $passengers): self
    {
        $this->passengers = $passengers;

        return $this;
    }

}