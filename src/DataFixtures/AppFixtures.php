<?php

namespace App\DataFixtures;

use App\Entity\BusInfo;
use App\Entity\PassengerInfo;
use App\Entity\Trip;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $bus = new BusInfo();
        $bus->setModelName('Ford');
        $bus->setColor('White');
        $bus->setGosNumber('A999AA763');


        $trip = new Trip();
        $trip->setSeatsAmount(50);
        $trip->setDeparturePlace('Tolyatti');
        $trip->setArrivalPlace('Samara');
        $trip->setDateOfDepartures(new \DateTimeImmutable('2022-12-31 23:59:59'));
        $trip->setDriverName('Mahmud Mahmudov');
        $trip->setBusInfo($bus);

        $manager->persist($trip);
        $manager->flush();
    }
}
