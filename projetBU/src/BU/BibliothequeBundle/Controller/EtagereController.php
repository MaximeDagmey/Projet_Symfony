<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Etagere;
use BU\BibliothequeBundle\Form\EtagereType;

/**
 * Etagere controller.
 *
 */
class EtagereController extends Controller
{
    
    public function EtagLivreAction(Etagere $etagere)
    {        
        $form = $this->createForm(EtagereType::class, $etagere);
        //$form->remove('etagere');
        $exemplaires = null;
        $message = null;
        $em = $this->getDoctrine()->getManager();
        
        $exemplaires = $em->getRepository('BUBibliothequeBundle:Etagere')->findEtagereLivre($etagere->getId());
        
        if(empty($exemplaires)){
                $message = "Aucun exemplaire n'est disponible";
            }
            else {
                $message = "Un ou des exemplaires sont disponibles pour ce livre";
            }

            return $this->render('BUBibliothequeBundle:Etagere:livre.html.twig', array(
            'exemplaires' => $exemplaires,
            'form' => $form->createView(),
            'message' => $message,
            ));
    }
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etageres = $em->getRepository('BUBibliothequeBundle:Etagere')->findAll();

        return $this->render('BUBibliothequeBundle:Etagere:index.html.twig', array(
            'etageres' => $etageres,
        ));
    }

    /**
     * Creates a new Etagere entity.
     *
     */
    public function newAction(Request $request)
    {
        $etagere = new Etagere();
        $form = $this->createForm(EtagereType::class, $etagere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etagere);
            $em->flush();

            return $this->redirectToRoute('etagere_show', array('id' => $etagere->getId()));
        }

        return $this->render('BUBibliothequeBundle:Etagere:new.html.twig', array(
            'etagere' => $etagere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etagere entity.
     *
     */
    public function showAction(Etagere $etagere)
    {
        $deleteForm = $this->createDeleteForm($etagere);

        return $this->render('BUBibliothequeBundle:Etagere:show.html.twig', array(
            'etagere' => $etagere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Etagere entity.
     *
     */
    public function editAction(Request $request, Etagere $etagere)
    {
        $deleteForm = $this->createDeleteForm($etagere);
        $editForm = $this->createForm(EtagereType::class, $etagere);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etagere);
            $em->flush();

            return $this->redirectToRoute('etagere_edit', array('id' => $etagere->getId()));
        }

        return $this->render('BUBibliothequeBundle:Etagere:edit.html.twig', array(
            'etagere' => $etagere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Etagere entity.
     *
     */
    public function deleteAction(Request $request, Etagere $etagere)
    {
        $deleteForm = $this->createDeleteForm($etagere);
        
        if ($deleteForm->isSubmitted() && $deleteForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $exemplaires = $em->getRepository('BUBibliothequeBundle:Etagere')->CountEtagereLivre($etagere->getId());
            if($exemplaires < 1){
                $em->remove($etagere);
                $em->flush();
                return $this->redirectToRoute('etagere_index');
            }
        }
        return $this->redirectToRoute('etagere_index');
    }

    private function createDeleteForm(Etagere $etagere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etagere_delete', array('id' => $etagere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
