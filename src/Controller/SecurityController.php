<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class SecurityController extends AbstractController
{
    
    /**
     * @Route("/", name="security_login")
     */
    public function loginUser(AuthenticationUtils $authenticationUtils)
    {

            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();

            if(isset($error)){
                $this->addFlash(
                    'danger',
                    'Attention , il semble y avoir un souci d\'authentification. Merci de vous connecter avec vos bons identifiants'
                );
            }

            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/sign-in.html.twig', [
            'last_username' => $lastUsername,
        ]);
    }

    /**
     * @Route("/signUp", name="security_signUp")
     */
    public function userSignUp()
    {
        return $this->render('security/sign-up.html.twig', [
        ]);
    }

    /**
    * @Route("/logout", name ="security_logout")
    */
    public function logout()
    {
       // controller can be blank: it will never be executed!
       throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

}
