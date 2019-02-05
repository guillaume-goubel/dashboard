<?php

namespace App\Repository;

use App\Entity\Sales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sales|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sales|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sales[]    findAll()
 * @method Sales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sales::class);
    }

    public function SalesInfos($userId)
    {
        $statment = $this->createQueryBuilder('s') 
                     ->innerJoin('s.seller', 'sales_Seller' )      
                     ->addSelect('sales_Seller')
                     ->innerjoin('s.customers', 'sales_Customers' )      
                     ->addSelect('sales_Customers')
                     ->andWhere('s.seller = :val')
                     ->setparameter('val', $userId);

        //RESULTAT
        return $statment->getQuery()->getResult();         
    }  

    public function SalesInfosByCustomer($idCustomer){

        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT * FROM customer WHERE id = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $idCustomer);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function SalesContractsByCustomer($userId, $idCustomer){

        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT * FROM sales WHERE seller_id = ? AND customers_id = ? ";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $userId);
        $stmt->bindValue(2, $idCustomer);
        $stmt->execute();

        return $stmt->fetchAll();
    }

}

