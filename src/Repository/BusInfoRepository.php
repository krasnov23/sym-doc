<?php

namespace App\Repository;

use App\Entity\BusInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BusInfo>
 *
 * @method BusInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusInfo[]    findAll()
 * @method BusInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusInfo::class);
    }

//    /**
//     * @return BusInfo[] Returns an array of BusInfo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BusInfo
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
