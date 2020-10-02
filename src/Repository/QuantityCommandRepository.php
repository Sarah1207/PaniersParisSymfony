<?php

namespace App\Repository;

use App\Entity\QuantityCommand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuantityCommand|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuantityCommand|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuantityCommand[]    findAll()
 * @method QuantityCommand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuantityCommandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuantityCommand::class);
    }

    // /**
    //  * @return QuantityCommand[] Returns an array of QuantityCommand objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuantityCommand
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

