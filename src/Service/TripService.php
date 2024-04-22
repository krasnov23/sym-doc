<?php

namespace App\Service;

use App\Entity\BusInfo;
use App\Entity\PassengerInfo;
use App\Entity\Trip;
use App\Exceptions\TripNotFoundException;
use App\Model\BusInfoModel;
use App\Model\TripResponse;
use App\Model\PassengerInfoModel;
use App\Model\TripModel;
use App\Repository\TripRepository;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;

class TripService
{
    public function __construct(private TripRepository $tripRepository)
    {
    }

    public function getAllTrips(): TripResponse
    {
        $buses = array_map(fn(Trip $trip) => (new TripModel())->setId($trip->getId())->setDriverName($trip->getDriverName())
            ->setDateOfDepartures($trip->getDateOfDepartures())->setDeparturePlace($trip->getDeparturePlace())
            ->setArrivalPlace($trip->getArrivalPlace())->setSeatsAmount($trip->getSeatsAmount())
            ->setBusInfo($this->mapBusInfo($trip->getBusInfo()))
            ->setPassengers($this->mapPassengersInfo($trip->getPassengers()->toArray()))
            ,$this->tripRepository->getAllWithBusInfoAndPassengers() );

        return new TripResponse($buses);

    }

    /**
     * @throws \Exception
     */
    public function getTripsByFilters(Request $request): TripResponse
    {
        $departurePlace = $request->query->get('departurePlace');
        $arrivingPlace = $request->query->get('arrivalPlace');
        $dateOfDepartures = $request->query->get('dateOfDepartures') ? new DateTimeImmutable($request->query->get('dateOfDepartures')) : null;

        $trips = $this->tripRepository->findTripByData($departurePlace,$arrivingPlace,$dateOfDepartures);

        if (!$trips)
        {
            throw new TripNotFoundException();
        }

        $mapTrips = array_map(fn(Trip $trip) => (new TripModel())->setId($trip->getId())->setDriverName($trip->getDriverName())
            ->setDateOfDepartures($trip->getDateOfDepartures())->setDeparturePlace($trip->getDeparturePlace())
            ->setArrivalPlace($trip->getArrivalPlace())->setSeatsAmount($trip->getSeatsAmount())
            ->setBusInfo($this->mapBusInfo($trip->getBusInfo()))
            ->setPassengers($this->mapPassengersInfo($trip->getPassengers()->toArray()))
            ,$trips);

        return new TripResponse($mapTrips);
    }

    private function mapPassengersInfo(array $passengers): array
    {
        return array_map(fn(PassengerInfo $passenger) => (new PassengerInfoModel())->setId($passenger->getId())
            ->setFullName($passenger->getFullName())->setPassportData($passenger->getPassportData())
            ->setSeatNumber($passenger->getSeatNumber())
            ,$passengers);
    }

    private function mapBusInfo(BusInfo $busInfo): BusInfoModel
    {
        return (new BusInfoModel())->setId($busInfo->getId())
            ->setGosNumber($busInfo->getGosNumber())
            ->setColor($busInfo->getColor())
            ->setModelName($busInfo->getModelName());
    }


}