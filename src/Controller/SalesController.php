<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Service\SalesService;
use App\Service\UserService; 

use Symfony\Component\Security\Core\User\UserInterface;

use App\Form\NewContractType;
use App\Form\EditContractType;
use App\Form\NewCustomerType;

use App\Entity\Sales;
use App\Entity\Customer;
use App\Service\CustomerService;


//=========================HOME DASHBOARD=========================
class SalesController extends AbstractController
{

    /**
     * @return INFOS for Dashboard
     * @Route("/user/home", name="home")
     */
    public function SalesAmount(SalesService $salesService, Request $request, UserInterface $user, UserService $userService)
    {  
        $userId = $user->getId(); 

        return $this->render('sales/index.html.twig' , [
            'sales' => $salesService->SalesInfos($userId),
            'userInfos' => $userService->UserInfos($userId),
        ]);
    }


    /**
     * @return LIST of contracts
     * @Route("/user/sales/customerList", name="contractList")
     */
    public function CostumerList(SalesService $salesService, Request $request, UserInterface $user)
    {
        $userId = $user->getId(); 

        $NumberOfContracts = count($salesService->SalesInfos($userId));

        $salesType = $salesService->SalesInfos($userId);

        return $this->render('sales/customerList.html.twig', [
            'sales' => $salesService->SalesInfos($userId),
            'NumberOfContracts' => $NumberOfContracts
        ]);
    }


    /**
     * @return INFOS for sales
     * @Route("/user/sales/salesInfos", name="SalesInfos")
     */
    public function SalesInfosDisplay(SalesService $salesService, CustomerService $customerService, Request $request, UserInterface $user)
    {
        $userId = $user->getId(); 

        return $this->render('sales/SalesInfos.html.twig' , [
            'customers' => $salesService->CustomersInfos($userId),
        ]);
    }

    
    /**
     * @return EDIT Customer 
     * @Route("/user/sales/editCustomer/{id}", name="editCustomer")
     */
    public function SalesInfosDisplaytest(SalesService $salesService, Request $request, UserInterface $user, Customer $customer)
    {
        $userId = $user->getId(); 
        $customerId = $customer->getId();

        $request = Request::createFromGlobals();

        $customerFirstname = $request->request->get('formCustomerFirstName');

        // var_dump($customerFirstname);
        // var_dump($customerId);

        $response = $this->getDoctrine()
        ->getRepository(Customer::class)
        ->SalesInfosByCustomer($customerId, $customerFirstname);

        return $this->redirectToRoute('SalesInfos');
    }


    /**
     * @return DELETE Customer 
    * @Route("/user/sales/customerDelete/{id}", name="SalesDelete", requirements={"id"="\d+"} )
    */
    public function SalesDelete(Request $request, Customer $customer)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($customer);

        $manager->flush();

        return $this->redirectToRoute('SalesInfos');
    }






}