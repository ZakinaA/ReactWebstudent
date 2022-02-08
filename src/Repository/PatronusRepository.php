<?php

namespace App\Repository;

use App\Entity\Patronus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patronus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patronus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patronus[]    findAll()
 * @method Patronus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatronusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patronus::class);
    }

    // /**
    //  * @return Patronus[] Returns an array of Patronus objects
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
    public function findOneBySomeField($value): ?Patronus
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
