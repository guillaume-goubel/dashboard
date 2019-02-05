<?php

namespace App\Controller;

use App\Entity\Sales;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxController extends AbstractController
{



    /**
     * @param idCustomer & $userId 
     * @return LIST of customers for salesinfostemplate ( list of customer by seller - part left)
     * @Route("/ajax", name="ajax")
     */
    public function index(UserInterface $user) :Response
    {
        $idCustomer = null;

        $userId = $user->getId();

        // L'id du customer envoyé en post via AJAX contactAJAX.js
        if(isset( $_POST['idCustomer'])){
            $idCustomer = $_POST['idCustomer']; 
        } 
        
        $customerResponse = $this->getDoctrine()
        ->getRepository(Sales::class)
        ->SalesInfosByCustomer($idCustomer);
        // ->SalesInfosByCustomer();

        $response = new Response(json_encode($customerResponse, JSON_PRETTY_PRINT));

        $response->headers->set('Content-Type', 'application/json');
        return $response;  
    }


    /**
     * @param idCustomer & $userId 
     * @return LIST of contract by customer for salesinfostemplate ( list of customer by seller - part right)
     * @Route("/ajax2", name="ajaxSales")
     */
    public function index2(UserInterface $user) :Response
    {
        $idCustomer = null;

        $userId = $user->getId();

        // L'id du customer envoyé en post via AJAX contactAJAX.js
        if(isset( $_POST['idCustomer'])){
            $idCustomer = $_POST['idCustomer']; 
        } 

        $contractResponse = $this->getDoctrine()
        ->getRepository(Sales::class)
        ->SalesContractsByCustomer($userId , $idCustomer);
 
        $response = new Response(json_encode($contractResponse, JSON_PRETTY_PRINT));

        $response->headers->set('Content-Type', 'application/json');
        return $response;  
    }
}
















        // $datas = $this->getDoctrine()
        //               ->getRepository(Sales::class)
        //               ->findAll();
        //                 //->getArrayResult();

        //                 // $categorias = $this->get('serializer')->serialize($categorias, 'json');
        //                 // $response = new Response( $datas );
        //                 // $response->headers->set('Content-Type', 'application/json');

        //                 dump($datas[0]);
                        
        //                 die();

        //                 $response = new Response(json_encode($datas[0]));
        //                 // $response = new JsonResponse(get_object_vars($datas));
        //                 $response->headers->set('Content-Type', 'application/json');

        //                 return $response;
                    
        //                 die();
        //                 dump($datas);

        //                 // $error = json_last_error_msg();
        //                 // dump($error);

                        

        //                 // dump($datas);

        //                 // foreach ($datas as $key => $value) {
        //                 //     $json  = json_encode($value);
        //                 //     dump($json);
        //                 // }

        //                 // $categorias = $data->getArrayResult();


        //                 // $object = json_decode(json_encode($datas));
        //                 // var_dump($object);

        //                 // $response = new Response (json_encode(array(
        //                 //     'data' => $datas
        //                 //     )));

        //                 // $response = new Response(json_encode($datas));
        //                 // $response = new JsonResponse(get_object_vars($datas));
        //                 // $response->headers->set('Content-Type', 'application/json');
                    
        //                 // dump($response);
        //                 // return $response;
                        




        //                 // $json  = json_encode($data);
        //                 // // dump($json );

        //                 // return new JsonResponse($json);

                        

        //             //   return new JsonResponse($data);

        //             //   $data =  $this->get('serializer')->serialize($data, 'json');
        //             //   return new JsonResponse($data);

        //             //    $json  = json_encode($sales);
        //             //    $response = new Response($json, 200);
        //             //    $response->headers->set('Content-Type', 'ajax/ajax.html.twig');
        //             //    return $response;
    

    // /**
    //  * Ca marche pour ces valeurs !
    //  * @Route("/ajax", name="ajax")
    //  */
    // public function returnAjaxJson():Response
    // {
    //     $data = ['foo1' => 'bar1', 'foo2' => 'bar2'];

    //     return new JsonResponse($data); //or $this->json($data) since Symfony 3.1
    // }


    // /**
    //  * 
    //  * @Route("/ajax", name="ajax")
    //  */
    // public function getAllCategoryAction() {

    //     $em = $this->getDoctrine()->getManager();
    //     $query = $em->createQuery(
    //         'SELECT s
    //          FROM Sales:Categoria s'
    //     );

    //     $categorias = $query->getArrayResult();
    
    //     $response = new Response(json_encode($categorias));
    //     $response->headers->set('Content-Type', 'application/json');
    
    //     return $response;
    // }