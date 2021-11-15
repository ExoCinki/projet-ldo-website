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

    public function findAllUserFonderie($level=150)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.fonderie >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }

    public function findAllUserMenuiserie($level=150)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.menuiserie >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }

    public function findAllUserTannerie($level=150)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.tannerie >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }

    public function findAllUserTissage($level=150)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.tissage >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }

    public function findAllUserTailleurDePierre($level=150)
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.TailleurDePierre >= :level'
        )->setParameter('level', $level);

        return $query->getResult();
    }

    public function findAllUserBySpeDESC()
    {
            
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            ORDER BY u.spe DESC'
        );

        return $query->getResult();
    }

    public function findAllUserByTank($spe='Tank')
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.spe = :spe'
        )->setParameter('spe', $spe);

        return $query->getResult();
    }
    public function findAllUserByOffTank($spe='Off Tank')
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.spe = :spe'
        )->setParameter('spe', $spe);

        return $query->getResult();
    }
    public function findAllUserByHeal($spe='Heal')
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.spe = :spe'
        )->setParameter('spe', $spe);

        return $query->getResult();
    }
    public function findAllUserByPalaHeal($spe='PalaHeal')
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.spe = :spe'
        )->setParameter('spe', $spe);

        return $query->getResult();
    }
    public function findAllUserByMage($spe='Mage')
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.spe = :spe'
        )->setParameter('spe', $spe);

        return $query->getResult();
    }
    public function findAllUserByDPSDistant($spe='DPS Distant (Déxtérité)')
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            
            'SELECT u
            FROM App\Entity\User AS u
            WHERE u.spe = :spe'
        )->setParameter('spe', $spe);

        return $query->getResult();
    }

}
