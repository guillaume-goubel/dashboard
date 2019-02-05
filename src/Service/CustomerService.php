<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\SalesRepository;

use App\Entity\customer;


class CustomerService {

    private $om;

    // , SalesRepository $SalesRepo
    public function __construct(ObjectManager $om){
        $this->om = $om;
    }

    public function CustomerInfos($customerId){
        $repo = $this->om->getRepository(customer::class);
        return $repo->find($customerId);
    }

    public function CustomerInfosBySeller($sellerId){
        $repo = $this->om->getRepository(customer::class);
        return $repo->CustomerInfosBySeller($sellerId);
    }

    public function QueryCustomer($userId){
        $repo = $this->om->getRepository(customer::class);
        return $repo->QueryCustomer($userId);
    }

}