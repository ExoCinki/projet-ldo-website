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

    public function findAllFarmNotCheck($checkornot = 'En attente de validation',$recolte = 'En Cours de Récolte',$trade = "En Attente d'échange")
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\Farm AS u
            WHERE u.checkOrNot = :checkornot OR u.checkOrNot = :recolte OR u.checkOrNot = :trade '
        )->setParameter('checkornot', $checkornot)
        ->setParameter('recolte', $recolte)
        ->setParameter('trade', $trade);

        return $query->getResult();
    }


    public function findAllFarmCheck($checkornot = 'Commande Fini', $refuser = 'Commande Refuser')
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\Farm AS u
            WHERE u.checkOrNot = :checkornot OR u.checkOrNot = :refuser'
        )->setParameter('checkornot', $checkornot)
        ->setParameter('refuser', $refuser);

        return $query->getResult();
    }
}
