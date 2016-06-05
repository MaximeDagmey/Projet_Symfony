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
        return $this->render('BUBibliothequeBundle:Default:menu.html.twig');
    }
    
}
