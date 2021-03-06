<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    /**
     * @return update of customer
     * @param idCustomer & all entity Cutomer
     */
    public function SalesInfosByCustomer($idCustomer, $customerFirstname){
        $conn = $this->getEntityManager()->getConnection();

        $sql = "UPDATE `customer` SET `first_name`= ?  WHERE id = ?"
        ;

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $customerFirstname);
        $stmt->bindValue(2, $idCustomer);
        return  $stmt->execute();
    }

}
