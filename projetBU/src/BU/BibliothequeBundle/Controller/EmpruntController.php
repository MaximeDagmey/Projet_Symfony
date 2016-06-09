<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Emprunt;
use BU\BibliothequeBundle\Form\EmpruntType;
use BU\BibliothequeBundle\Form\LivreType;
use BU\BibliothequeBundle\Form\UserType;
use BU\BibliothequeBundle\Form\ArchivageType;
use BU\BibliothequeBundle\Entity\Livre;
use BU\BibliothequeBundle\Entity\User;
use BU\BibliothequeBundle\Entity\Archivage;

/**
 * Emprunt controller.
 *
 */
class EmpruntController extends Controller
{
    /**
     * Lists all Emprunt entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
         $titre = "Liste des emprunts";

        $emprunts = $em->getRepository('BUBibliothequeBundle:Emprunt')->findAll();

        return $this->render('BUBibliothequeBundle:Emprunt:index.html.twig', array(
             'emprunts' => $emprunts,
             'titre' => $titre,
        ));
    }
    
      public function horsdelaiAction()
    {
        $em = $this->getDoctrine()->getManager();
        $titre = "Liste des emprunts hors délai";

        $emprunts = $em->getRepository('BUBibliothequeBundle:Emprunt')->findEmpHorsdelai();

        return $this->render('BUBibliothequeBundle:Emprunt:index.html.twig', array(
            'emprunts' => $emprunts,
            'titre' => $titre,
        ));
    }


    /**
     * Creates a new Emprunt entity.
     *
     */
    public function newAction(Request $request)
    {
        $emprunt = new Emprunt();
        $form = $this->createForm(EmpruntType::class, $emprunt);
        $date = new \Datetime('now');
        $form->get('date')->setData($date);
        $form->handleRequest($request);
        $message = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $exemplaires = $em->getRepository('BUBibliothequeBundle:Exemplaire')->findExemplaireLivre($emprunt->getLivre()->getLivreExemplaire()->getTitre());
            $reservation = $em->getRepository('BUBibliothequeBundle:Reservation')->findReservationLivre($emprunt->getLivre()->getLivreExemplaire()->getTitre());
            $empruntlibre = $em->getRepository('BUBibliothequeBundle:Emprunt')->findExempLivreLibre($emprunt->getLivre()->getLivreExemplaire()->getTitre());
            $exemplaireemprunt = $em->getRepository('BUBibliothequeBundle:Emprunt')->findExemplaireEmprunt($emprunt->getLivre()->getId());
            if($emprunt->getUser()->getCycle() == 1){
              $useremp = $em->getRepository('BUBibliothequeBundle:Emprunt')->findEmpuser($emprunt->getUser());
              if($useremp >= 5){
                   $message = "L'utilisateur ne peut plus faire d'emprunt";
                 return $this->render('BUBibliothequeBundle:Emprunt:new.html.twig', array(
                     'emprunt' => $emprunt,
                     'form' => $form->createView(),
                     'message' => $message,
                 ));
              }
            }
            if( $reservation >= $exemplaires || $empruntlibre == 0 ){
                $message = "Le livre n'est pas disponible";
                 return $this->render('BUBibliothequeBundle:Emprunt:new.html.twig', array(
                     'emprunt' => $emprunt,
                     'form' => $form->createView(),
                     'message' => $message,
                 ));
            }
            if ($exemplaireemprunt == 1){
                 $message = "Cet exemplaire n'est pas disponible";
                 return $this->render('BUBibliothequeBundle:Emprunt:new.html.twig', array(
                     'emprunt' => $emprunt,
                     'form' => $form->createView(),
                     'message' => $message,
                 ));
            }
            else 
               
            $em->persist($emprunt);
            $em->flush();

            return $this->redirectToRoute('emprunt_show', array('id' => $emprunt->getId()));
        }

        return $this->render('BUBibliothequeBundle:Emprunt:new.html.twig', array(
            'emprunt' => $emprunt,
            'form' => $form->createView(),
            'message' => $message,
        ));
    }
    
     public function empruntparlivreAction(Request $request)
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->remove('themes');
        $form->remove('notice');
        $form->handleRequest($request);
        $emprunts = null;
        $titre = "Recherche d'emprunts par livre";

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $emprunts = $em->getRepository('BUBibliothequeBundle:Emprunt')->findEmpruntLivre($livre->getTitre());

              return $this->render('BUBibliothequeBundle:Emprunt:search.html.twig', array('emprunts' => $emprunts,'form' => $form->createView(), 'titre' => $titre,));
        }

        return $this->render('BUBibliothequeBundle:Emprunt:search.html.twig', array('emprunts' => $emprunts,'form' => $form->createView(), 'titre' => $titre,));
    }
    
       public function dispolivreAction(Request $request)
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->remove('themes');
        $form->remove('notice');
        $form->handleRequest($request);
        $exemplaires = null;
        $reservation = null;
        $message = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $exemplaires = $em->getRepository('BUBibliothequeBundle:Exemplaire')->findExemplaireLivre($livre->getTitre());
            $reservation = $em->getRepository('BUBibliothequeBundle:Reservation')->findReservationLivre($livre->getTitre());
            $emprunt = $em->getRepository('BUBibliothequeBundle:Emprunt')->findExempLivreLibre($livre->getTitre());
            if($reservation >= $exemplaires || $emprunt == 0 ){
                $message = "Aucun exemplaire n'est disponible";
            }
            else {
                $message = "Un ou des exemplaires sont disponibles pour ce livre";
            }

              return $this->render('BUBibliothequeBundle:Emprunt:dispo.html.twig', array(
                'form' => $form->createView(),
                'message' => $message,
               ));
        }

        return $this->render('BUBibliothequeBundle:Emprunt:dispo.html.twig', array(
            'form' => $form->createView(),
             'message' => $message,
        ));
    }
    
    public function empruntparuserAction(Request $request)
    {   $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->remove('cycle');
        $form->remove('password');
        $form->remove('faculte');
        $form->handleRequest($request);
        $emprunts = null;
        $titre = "Recherche d'emprunts par utilisateur";
        
        if ($form->isSubmitted() && $form->isValid()) {
             $em = $this->getDoctrine()->getManager();
             $emprunts = $em->getRepository('BUBibliothequeBundle:Emprunt')->findEmpruntUser($user->getNom(),$user->getPrenom());

              return $this->render('BUBibliothequeBundle:Emprunt:search.html.twig', array('emprunts' => $emprunts,'form' => $form->createView(), 'titre' => $titre,));
        }

        return $this->render('BUBibliothequeBundle:Emprunt:search.html.twig', array('emprunts' => $emprunts,'form' => $form->createView(), 'titre' => $titre, ));
    }

    /**
     * Finds and displays a Emprunt entity.
     *
     */
    public function showAction(Emprunt $emprunt)
    {
        $deleteForm = $this->createDeleteForm($emprunt);

        return $this->render('BUBibliothequeBundle:Emprunt:show.html.twig', array(
            'emprunt' => $emprunt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Emprunt entity.
     *
     */
    public function editAction(Request $request, Emprunt $emprunt)
    {
        $deleteForm = $this->createDeleteForm($emprunt);
        $editForm = $this->createForm(EmpruntType::class, $emprunt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emprunt);
            $em->flush();

            return $this->redirectToRoute('emprunt_edit', array('id' => $emprunt->getId()));
        }

        return $this->render('BUBibliothequeBundle:Emprunt:edit.html.twig', array(
            'emprunt' => $emprunt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
     public function retourAction(Request $request,$id)
    {
       $archivage = new Archivage;
       $message = '';
       $form = $this->createForm(ArchivageType::class, $archivage);
       $date_retour = new \Datetime('now');
       $form->get('dateretour')->setData($date_retour);
       $form->remove('date');
       $form->remove('livre');
       $form->remove('user');
       $user= $this->getUser();
       $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $message = 'ajout';
            $em = $this->getDoctrine()->getManager();
            $emprunt = $em->getRepository('BUBibliothequeBundle:Emprunt')->find($id);
            $archivage->setDate($emprunt->getDate());
            $archivage->setLivre($emprunt->getLivre());
            $archivage->setUser($emprunt->getUser());
            $em->persist($archivage);
            $em->remove($emprunt);
            $em->flush();
            if ($this->isGranted('ROLE_PRET') or $this->isGranted('ROLE_DIRECTEUR'))
                return $this->redirectToRoute('emprunt_index');
            else
                 return $this->redirectToRoute('menu');
        }
      
        return $this->render('BUBibliothequeBundle:Emprunt:retour.html.twig', array(
            'form' => $form->createView(),
            'message' => $message,
        ));     
    }

    /**
     * Deletes a Emprunt entity.
     *
     */
    public function deleteAction(Request $request, Emprunt $emprunt)
    {
        $form = $this->createDeleteForm($emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emprunt);
            $em->flush();
        }

        return $this->redirectToRoute('emprunt_index');
    }

    /**
     * Creates a form to delete a Emprunt entity.
     *
     * @param Emprunt $emprunt The Emprunt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Emprunt $emprunt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emprunt_delete', array('id' => $emprunt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
