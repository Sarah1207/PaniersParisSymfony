<?php

namespace App\Repository;

use App\Entity\Producteurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Producteurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Producteurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Producteurs[]    findAll()
 * @method Producteurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProducteursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producteurs::class);
    }

    // /**
    //  * @return Producteurs[] Returns an array of Producteurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Producteurs
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
