<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Exemplaire;
use BU\BibliothequeBundle\Form\ExemplaireType;
use BU\BibliothequeBundle\Entity\Livre;
use BU\BibliothequeBundle\Form\LivreType;

/**
 * Exemplaire controller.
 *
 */
class ExemplaireController extends Controller
{
    /**
     * Lists all Exemplaire entities.
     *
     */
     
    public function ExempLivreAction(Request $request)
    {        
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->remove('themes');
        $form->remove('notice');
        $form->handleRequest($request);
        $exemplaires = null;
        $message = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $exemplaires = $em->getRepository('BUBibliothequeBundle:Exemplaire')->findDispoLivre($livre->getTitre());
             //$exemplaires = $em->getRepository('BUBibliothequeBundle:Emprunt')->findDispoLivre($livre->getTitre());
            if(empty($exemplaires)){
                $message = "Aucun exemplaire n'est disponible";
            }
            else {
                $message = "Un ou des exemplaires sont disponibles pour ce livre";
            }

              return $this->render('BUBibliothequeBundle:Exemplaire:livres.html.twig', array(
                'exemplaires' => $exemplaires,
                'form' => $form->createView(),
                'message' => $message,
               ));
        }

        return $this->render('BUBibliothequeBundle:Exemplaire:livres.html.twig', array(
            'exemplaires' => $exemplaires,
            'form' => $form->createView(),
             'message' => $message,
        ));   
    }
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $exemplaires = $em->getRepository('BUBibliothequeBundle:Exemplaire')->findAll();

        return $this->render('BUBibliothequeBundle:Exemplaire:index.html.twig', array(
            'exemplaires' => $exemplaires,
        ));
    }

    /**
     * Creates a new Exemplaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $exemplaire = new Exemplaire();
        $form = $this->createForm(ExemplaireType::class, $exemplaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $nb = $em->getRepository('BUBibliothequeBundle:Exemplaire')->findExemplaireLivre($exemplaire->getLivreexemplaire()->getTitre());
            if($nb >= 100){
                return $this->render('BUBibliothequeBundle:Exemplaire:new.html.twig', array(
                    'exemplaire' => $exemplaire,
                    'form' => $form->createView(),
                ));
            }
            else{
                $em->persist($exemplaire);
                $em->flush();

                return $this->redirectToRoute('exemplaire_show', array('id' => $exemplaire->getId()));      
            }
        }

        return $this->render('BUBibliothequeBundle:Exemplaire:new.html.twig', array(
            'exemplaire' => $exemplaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Exemplaire entity.
     *
     */
    public function showAction(Exemplaire $exemplaire)
    {
        $deleteForm = $this->createDeleteForm($exemplaire);

        return $this->render('BUBibliothequeBundle:Exemplaire:show.html.twig', array(
            'exemplaire' => $exemplaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Exemplaire entity.
     *
     */
    public function editAction(Request $request, Exemplaire $exemplaire)
    {
        $deleteForm = $this->createDeleteForm($exemplaire);
        $editForm = $this->createForm(ExemplaireType::class, $exemplaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($exemplaire);
            $em->flush();

            return $this->redirectToRoute('exemplaire_edit', array('id' => $exemplaire->getId()));
        }

        return $this->render('BUBibliothequeBundle:Exemplaire:edit.html.twig', array(
            'exemplaire' => $exemplaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Exemplaire entity.
     *
     */
    public function deleteAction(Request $request, Exemplaire $exemplaire)
    {
        $form = $this->createDeleteForm($exemplaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($exemplaire);
            $em->flush();
        }

        return $this->redirectToRoute('exemplaire_index');
    }

    /**
     * Creates a form to delete a Exemplaire entity.
     *
     * @param Exemplaire $exemplaire The Exemplaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Exemplaire $exemplaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('exemplaire_delete', array('id' => $exemplaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
}
