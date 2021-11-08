<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function findAllUserFurnishing($level=150)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.Ameublement >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }

    public function findAllUserCraftWeapons($level=150)
    {
            $entityManager = $this->getEntityManager();

            $query = $entityManager->createQuery(
                
                'SELECT u
                FROM App\Entity\User AS u
                WHERE u.FabArmes >= :level'
            )->setParameter('level', $level);
    
            return $query->getResult();
    }

    public function findAllUserEngineering($level=150)
    {
            $entityManager = $this->getEntityManager();

            $query = $entityManager->createQuery(
                
                'SELECT u
                FROM App\Entity\User AS u
                WHERE u.Ingenierie >= :level'
            )->setParameter('level', $level);
    
            return $query->getResult();
    }
    public function findAllUserJewel($level=150)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.Joaillerie >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }
    public function findAllUserArcana($level=150)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.ArtsObscurs >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }
    public function findAllUserCooking($level=150)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.Cuisine >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }
    public function findAllUserArmoring($level=150)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.FabArmures >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }
}
