<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function UserInfos($userId) 
    {
        $statment = $this->createQueryBuilder('u')
                     ->innerJoin('u.professions', 'user_profession' )      
                     ->addSelect('user_profession')
                     ->andWhere('u.id = :val')
                     ->setparameter('val', $userId);
                     
        //RESULTAT
        return $statment->getQuery()->getResult();         
    }  



}
