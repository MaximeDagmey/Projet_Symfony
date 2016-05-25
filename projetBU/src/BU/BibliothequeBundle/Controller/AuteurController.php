<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Auteur;
use BU\BibliothequeBundle\Form\AuteurType;

/**
 * Auteur controller.
 *
 */
class AuteurController extends Controller
{
    /**
     * Lists all Auteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $auteurs = $em->getRepository('BUBibliothequeBundle:Auteur')->findAll();

        return $this->render('auteur/index.html.twig', array(
            'auteurs' => $auteurs,
        ));
    }

    /**
     * Creates a new Auteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();

            return $this->redirectToRoute('auteur_show', array('id' => $auteur->getId()));
        }

        return $this->render('auteur/new.html.twig', array(
            'auteur' => $auteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Auteur entity.
     *
     */
    public function showAction(Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);

        return $this->render('auteur/show.html.twig', array(
            'auteur' => $auteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Auteur entity.
     *
     */
    public function editAction(Request $request, Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);
        $editForm = $this->createForm(AuteurType::class, $auteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();

            return $this->redirectToRoute('auteur_edit', array('id' => $auteur->getId()));
        }

        return $this->render('auteur/edit.html.twig', array(
            'auteur' => $auteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Auteur entity.
     *
     */
    public function deleteAction(Request $request, Auteur $auteur)
    {
        $form = $this->createDeleteForm($auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($auteur);
            $em->flush();
        }

        return $this->redirectToRoute('auteur_index');
    }

    /**
     * Creates a form to delete a Auteur entity.
     *
     * @param Auteur $auteur The Auteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Auteur $auteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auteur_delete', array('id' => $auteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
