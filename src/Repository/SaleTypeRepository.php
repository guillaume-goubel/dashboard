<?php

namespace App\Repository;

use App\Entity\SaleType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SaleType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SaleType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SaleType[]    findAll()
 * @method SaleType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaleTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SaleType::class);
    }

}
