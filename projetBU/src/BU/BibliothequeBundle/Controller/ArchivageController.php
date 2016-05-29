<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Archivage;
use BU\BibliothequeBundle\Form\ArchivageType;

/**
 * Archivage controller.
 *
 */
class ArchivageController extends Controller
{
    /**
     * Lists all Archivage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $archivages = $em->getRepository('BUBibliothequeBundle:Archivage')->findAll();

        return $this->render('BUBibliothequeBundle:Archivage:index.html.twig', array(
            'archivages' => $archivages,
        ));
    }

    /**
     * Creates a new Archivage entity.
     *
     */
    public function newAction(Request $request)
    {
        $archivage = new Archivage();
        $form = $this->createForm(ArchivageType::class, $archivage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($archivage);
            $em->flush();

            return $this->redirectToRoute('archivage_show', array('id' => $archivage->getId()));
        }

        return $this->render('BUBibliothequeBundle:Archivage:new.html.twig', array(
            'archivage' => $archivage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Archivage entity.
     *
     */
    public function showAction(Archivage $archivage)
    {
        $deleteForm = $this->createDeleteForm($archivage);

        return $this->render('BUBibliothequeBundle:Archivage:show.html.twig', array(
            'archivage' => $archivage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Archivage entity.
     *
     */
    public function editAction(Request $request, Archivage $archivage)
    {
        $deleteForm = $this->createDeleteForm($archivage);
        $editForm = $this->createForm(ArchivageType::class, $archivage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($archivage);
            $em->flush();

            return $this->redirectToRoute('archivage_edit', array('id' => $archivage->getId()));
        }

        return $this->render('BUBibliothequeBundle:Archivage:edit.html.twig', array(
            'archivage' => $archivage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Archivage entity.
     *
     */
    public function deleteAction(Request $request, Archivage $archivage)
    {
        $form = $this->createDeleteForm($archivage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($archivage);
            $em->flush();
        }

        return $this->redirectToRoute('archivage_index');
    }

    /**
     * Creates a form to delete a Archivage entity.
     *
     * @param Archivage $archivage The Archivage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Archivage $archivage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('archivage_delete', array('id' => $archivage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
