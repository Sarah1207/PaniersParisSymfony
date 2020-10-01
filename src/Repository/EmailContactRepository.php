<?php

namespace App\Repository;

use App\Entity\EmailContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmailContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailContact[]    findAll()
 * @method EmailContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmailContact::class);
    }

    // /**
    //  * @return EmailContact[] Returns an array of EmailContact objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmailContact
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
