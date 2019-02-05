<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\SalesRepository;

use App\Entity\Sales;

class SalesService {

    private $om;

    // , SalesRepository $SalesRepo
    public function __construct(ObjectManager $om){
        $this->om = $om;
    }

    public function SalesInfos($userId){
        $repo = $this->om->getRepository(Sales::class);
        return $repo->SalesInfos($userId);
    }

    public function CustomerInfosBySeller($sellerId){
        $repo = $this->om->getRepository(customer::class);
        return $repo->CustomerInfosBySeller($sellerId);
    }

    public function CustomersInfos($userId){
        $repo = $this->om->getRepository(Sales::class);
        return $repo->CustomersInfos($userId);
    }
}