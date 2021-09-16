<?php

namespace App\Repository;

use App\Entity\MotifVoyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MotifVoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method MotifVoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method MotifVoyage[]    findAll()
 * @method MotifVoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotifVoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MotifVoyage::class);
    }

    // /**
    //  * @return MotifVoyage[] Returns an array of MotifVoyage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MotifVoyage
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
