<?php

namespace App\Repository;

use App\Entity\Trip;
use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trip>
 *
 * @method Trip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trip[]    findAll()
 * @method Trip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TripRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trip::class);
    }

    public function getAllWithBusInfoAndPassengers(): array
    {
        return $this->createQueryBuilder('t')
            ->addSelect('b')
            ->leftJoin('t.busInfo','b')
            ->addSelect('p')
            ->leftJoin('t.passengers','p')
            ->getQuery()->getResult();
    }

    public function findTripByData(string $departurePlace = null, string $arrivalPlace = null,
                                   DateTimeImmutable $dateOfDepartures = null ): array
    {
        $trip = $this->createQueryBuilder('t')
            ->addSelect('b')
            ->leftJoin('t.busInfo','b')
            ->addSelect('p')
            ->leftJoin('t.passengers','p');

        if ($departurePlace)
        {
            $trip->where('t.departurePlace = :departurePlace')
                ->setParameter('departurePlace',$departurePlace);
        }

        if ($arrivalPlace)
        {
            $trip->where('t.arrivalPlace = :arrivalPlace')
                ->setParameter('arrivalPlace',$arrivalPlace);
        }

        if ($dateOfDepartures)
        {
            $trip->andWhere('t.dateOfDepartures >= :dateOfDepartures')
                ->setParameter('dateOfDepartures',$dateOfDepartures);
        }

        return $trip->getQuery()->getResult();
    }

//    /**
//     * @return Trip[] Returns an array of Trip objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Trip
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
