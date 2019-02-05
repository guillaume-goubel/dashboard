<?php

namespace App\Controller;

use App\entity\Customer;
use App\Form\NewCustomerType;

use App\entity\Sales;
use App\Service\SalesService;
use App\Form\NewContractType;

use App\entity\User;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;

class SellerController extends AbstractController
{

    /**
     * @Route("/user/seller/agenda", name="SellerAgenda")
     */
    public function sellerAgenda()
    {
        return $this->render('seller/sellerAgenda.html.twig');
    }

    
    /**
     * @Route("/user/seller/newCustomer", name="newCustomer")
     */
    public function sellerNewcustomer(Request $request , SessionInterface $session)
    {  

        $customer = new Customer();
        $RegisterCustomerType = $this->createForm(NewCustomerType::class, $customer);            
        
        // Intercepter les données envoyées en requete HTTP
        $RegisterCustomerType->handleRequest($request);

        if ($RegisterCustomerType->isSubmitted() and $RegisterCustomerType->isValid()) {
            
            // 1 enregistrement du nouveau client
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($customer);
            $manager->flush();

            // 2 Récupération des nouvelels données client
            $newCustomerId = $customer->getId();
            $newCustomerFirstName = $customer->getFirstName();
            $newCustomerLastName = $customer->getLastName();
            $newCustomerAddress = $customer->getAddress();
            $newcustomerZipCode = $customer->getZipCode();
            $newcustomerCity = $customer->getCity();
            $newcustomerEmail = $customer->getEmail();
            
            // 3 Détermination de la session
            $session = $this->get('session');
                // 3.1 tableau array de la session avec les variables New client dans un tableau
            $infosCustomerArray = [
                'infosCustomerArray' => [
                    'id' => $newCustomerId,
                    'firstName' => $newCustomerFirstName,
                    'lastName' => $newCustomerLastName,
                    'address' => $newCustomerAddress,
                    'zipcode' => $newcustomerZipCode,
                    'city' => $newcustomerCity,
                    'email' => $newcustomerEmail
                ],
            ];
                // 3.2 set de la seesion avec les données du tableau
            $session->set('infosCustomerArray', $infosCustomerArray);

            // 4 Renvoi vers la page nouveau contrat
            return $this->redirectToRoute('newContract');
        }

        return $this->render('sales/newCustomer.html.twig' ,[
            'formType' => $RegisterCustomerType->createView(),
        ]);
    }

    /**
     * @Route("/user/seller/newcontract", name="newContract")
     */
    public function contractList(Request $request, UserInterface $user, SessionInterface $session){

        $userId = $user->getId();

        // Récupération de la session set dans le controller 'sellerNewcustomer' pour notamment l'envoyer 
        // en option dans le formulaire et ne porposer que le user en cours
        $infosCustomer = $session->get('infosCustomerArray');

            // récupération de l'id du user dans la session pour l'envoyer en option dans le formulaire pour
            // n'afficher que le dernier client
        $newCustomerId = $infosCustomer["infosCustomerArray"]['id'];
        
        $sale = new Sales();
        $newContractType = $this->createForm(NewContractType::class, $sale, array(
            'user' => $user->getId(),
            'newCustomerId' => $newCustomerId,   
        ));

        $newContractType->handleRequest($request);

        if ($newContractType->isSubmitted() and $newContractType->isValid()) {

            // 1 enregistrement du nouveau client
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($sale);
            $manager->flush();

            $session->remove('infosCustomerArray');

            return $this->redirectToRoute('contractList');
        }

        return $this->render('sales/newContract.html.twig' ,[
            'infosCustomer' => $infosCustomer,
            'formContratType' => $newContractType->createView(),
        ]);
    }
}

