<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Livre;
use BU\BibliothequeBundle\Form\LivreType;

/**
 * Livre controller.
 *
 */
class LivreController extends Controller
{
    /**
     * Lists all Livre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livres = $em->getRepository('BUBibliothequeBundle:Livre')->findAll();

        return $this->render('livre/index.html.twig', array(
            'livres' => $livres,
        ));
    }

    /**
     * Creates a new Livre entity.
     *
     */
    public function newAction(Request $request)
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('livre_show', array('id' => $livre->getId()));
        }

        return $this->render('BUBibliothequeBundle:Livre:new.html.twig', array(
            'livre' => $livre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Livre entity.
     *
     */
    public function showAction(Livre $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);

        return $this->render('BUBibliothequeBundle:Livre:show.html.twig', array(
            'livre' => $livre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Livre entity.
     *
     */
    public function editAction(Request $request, Livre $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);
        $editForm = $this->createForm(LivreType::class, $livre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('livre_edit', array('id' => $livre->getId()));
        }

        return $this->render('BUBibliothequeBundle:Livre:edit.html.twig', array(
            'livre' => $livre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Livre entity.
     *
     */
    public function deleteAction(Request $request, Livre $livre)
    {
        $form = $this->createDeleteForm($livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livre);
            $em->flush();
        }

        return $this->redirectToRoute('livre_index');
    }

    /**
     * Creates a form to delete a Livre entity.
     *
     * @param Livre $livre The Livre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Livre $livre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livre_delete', array('id' => $livre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
