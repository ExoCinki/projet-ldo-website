<?php

namespace App\Repository;

use App\Entity\Gemme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gemme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gemme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gemme[]    findAll()
 * @method Gemme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GemmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gemme::class);
    }

    public function FindAllSortAtStuff()
    {
        return $this->createQueryBuilder('q')
            ->orderBy('q.stuff', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
