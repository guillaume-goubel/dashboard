<?php

namespace App\Repository;

use App\Entity\Profession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Profession|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profession|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profession[]    findAll()
 * @method Profession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Profession::class);
    }

}
