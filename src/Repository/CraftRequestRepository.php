<?php

namespace App\Repository;

use App\Entity\CraftRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CraftRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method CraftRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method CraftRequest[]    findAll()
 * @method CraftRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CraftRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CraftRequest::class);
    }

    public function findAllCraftNotCheck($checkornot = 0)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\CraftRequest AS u
            WHERE u.checkOrNot = :checkornot'
        )->setParameter('checkornot', $checkornot);

        return $query->getResult();
    }

    public function findAllCraftCheck($checkornot = 1)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\CraftRequest AS u
            WHERE u.checkOrNot = :checkornot'
        )->setParameter('checkornot', $checkornot);

        return $query->getResult();
    }
}
