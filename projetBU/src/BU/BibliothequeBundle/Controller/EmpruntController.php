<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Emprunt;
use BU\BibliothequeBundle\Form\EmpruntType;

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

        $emprunts = $em->getRepository('BUBibliothequeBundle:Emprunt')->findAll();

        return $this->render('emprunt/index.html.twig', array(
            'emprunts' => $emprunts,
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
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emprunt);
            $em->flush();

            return $this->redirectToRoute('emprunt_show', array('id' => $emprunt->getId()));
        }

        return $this->render('emprunt/new.html.twig', array(
            'emprunt' => $emprunt,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Emprunt entity.
     *
     */
    public function showAction(Emprunt $emprunt)
    {
        $deleteForm = $this->createDeleteForm($emprunt);

        return $this->render('emprunt/show.html.twig', array(
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

        return $this->render('emprunt/edit.html.twig', array(
            'emprunt' => $emprunt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
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
