<?php
namespace BU\BibliothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils'); 
        $error = $authenticationUtils->getLastAuthenticationError(); 
        $lastUsername = $authenticationUtils->getLastUsername(); 
        return $this->render('BUBibliothequeBundle:Security:login.html.twig', array( 
            'last_username' => $lastUsername, 
            'error'         => $error)); 
    }
}