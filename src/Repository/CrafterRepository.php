<?php

namespace App\Repository;

use App\Entity\Crafter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Crafter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Crafter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Crafter[]    findAll()
 * @method Crafter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrafterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crafter::class);
    }

    // /**
    //  * @return Crafter[] Returns an array of Crafter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Crafter
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
