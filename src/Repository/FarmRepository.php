<?php

namespace App\Repository;

use App\Entity\Farm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Farm|null find($id, $lockMode = null, $lockVersion = null)
 * @method Farm|null findOneBy(array $criteria, array $orderBy = null)
 * @method Farm[]    findAll()
 * @method Farm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Farm::class);
    }

    public function findAllFarmNotCheck($checkornot = 0)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\Farm AS u
            WHERE u.checkOrNot = :checkornot'
        )->setParameter('checkornot', $checkornot);

        return $query->getResult();
    }

    public function findAllFarmCheck($checkornot = 1)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\Farm AS u
            WHERE u.checkOrNot = :checkornot'
        )->setParameter('checkornot', $checkornot);

        return $query->getResult();
    }
}
