<?php

namespace App\Repository;

use App\Entity\SecurityController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SecurityController|null find($id, $lockMode = null, $lockVersion = null)
 * @method SecurityController|null findOneBy(array $criteria, array $orderBy = null)
 * @method SecurityController[]    findAll()
 * @method SecurityController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecurityControllerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SecurityController::class);
    }

    // /**
    //  * @return SecurityController[] Returns an array of SecurityController objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SecurityController
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
