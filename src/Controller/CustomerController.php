<?php

namespace App\Controller;

use App\Entity\Customer;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use App\Service\CustomerService;

class CustomerController extends AbstractController
{

    /**
     * @return MAP of customer location
    * @Route("/user/customer/customerMap/{id}", name="CustomerMap", requirements={"id"="\d+"})
    */
    public function CustomerMap(CustomerService $customerService, Request $request, Customer $customer )
    {

        // Afin de récupérer l'adresse et l'envoyer à l'URL pour afficher la page dynamiquement il faut :

         // 1 (optionnel pour récuper les infos client , car rien qu'en passant Customer) --> Récupérer l'id passé en url pour afficher la carte du bon client et de la bonne vente
        //  $url = $_SERVER['REQUEST_URI'];
        //  $urlExplode = explode("/", $url);
        //  $urlLength = count($urlExplode);
        //  $customerId = $urlExplode[$urlLength - 1];

        //  $customerInfos = $customerService->CustomerInfos($customerId);

         // 2 récupérer l'adresse et l'id du customer courant
         $customerAddress = $customer->getAddress();
         $customerId = $customer->getId();
         
         // 3 remplacer les espaces par des + (car nécessaire pour envoyer en url)
         $customerAddressWithPlus = str_replace(' ', '+', $customerAddress);
         
    return $this->render('customer/googleMap.html.twig' , [
         'customer' => $customerService->CustomerInfos($customerId),
         'customerAddressWithPlus' => $customerAddressWithPlus
    ]);

    }


}
