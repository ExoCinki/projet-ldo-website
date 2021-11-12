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

    public function findAllCraftNotCheck($checkornot = 'En attente de validation',$Craft = 'En Cours de Craft',$trade = "En Attente d'échange")
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\CraftRequest AS u
            WHERE u.checkOrNot = :checkornot OR u.checkOrNot = :Craft OR u.checkOrNot = :trade '
        )->setParameter('checkornot', $checkornot)
        ->setParameter('Craft', $Craft)
        ->setParameter('trade', $trade);

        return $query->getResult();
    }


    public function findAllCraftCheck($checkornot = 'Commande Fini', $refuser = 'Commande Refuser')
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\CraftRequest AS u
            WHERE u.checkOrNot = :checkornot OR u.checkOrNot = :refuser'
        )->setParameter('checkornot', $checkornot)
        ->setParameter('refuser', $refuser);

        return $query->getResult();
    }
}
