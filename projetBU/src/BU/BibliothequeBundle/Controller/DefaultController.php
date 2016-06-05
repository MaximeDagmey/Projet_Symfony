<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BUBibliothequeBundle:Default:index.html.twig');
    }
    
    public function menuAction()
    {
        $utilisateur= $this->getUser();
                
        return $this->render('BUBibliothequeBundle:Default:menu.html.twig', array('utilisateur' => $utilisateur,));
    }
    
}
