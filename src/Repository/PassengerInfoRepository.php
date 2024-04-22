<?php

namespace App\Repository;

use App\Entity\PassengerInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PassengerInfo>
 *
 * @method PassengerInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PassengerInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PassengerInfo[]    findAll()
 * @method PassengerInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassengerInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PassengerInfo::class);
    }

//    /**
//     * @return PassengerInfo[] Returns an array of PassengerInfo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PassengerInfo
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
