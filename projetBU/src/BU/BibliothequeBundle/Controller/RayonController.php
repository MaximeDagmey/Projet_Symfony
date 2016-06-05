<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Rayon;
use BU\BibliothequeBundle\Form\RayonType;
use BU\BibliothequeBundle\Entity\Livre;
use BU\BibliothequeBundle\Form\LivreType;

/**
 * Rayon controller.
 *
 */
        
class RayonController extends Controller
{

     
     public function RayonLivreAction(Rayon $rayon)
    {        
        $form = $this->createForm(RayonType::class, $rayon);
        //$form->remove('themes');
        $form->remove('notice');
        $exemplaires = null;
        $message = null;
        $em = $this->getDoctrine()->getManager();
        
        $exemplaires = $em->getRepository('BUBibliothequeBundle:Rayon')->findRayonLivre($rayon->getId());
        
        if(empty($exemplaires)){
                $message = "Aucun exemplaire n'est disponible";
            }
            else {
                $message = "Un ou des exemplaires sont disponibles pour ce livre";
            }

            return $this->render('BUBibliothequeBundle:Rayon:livre.html.twig', array(
            'exemplaires' => $exemplaires,
            'form' => $form->createView(),
            'message' => $message,
            ));
    }
    
    public function RayonEtageAction(Rayon $rayon)
    {        
        $form = $this->createForm(RayonType::class, $rayon);
        $form->remove('notice');
        $etage = null;
        $message = null;
        $em = $this->getDoctrine()->getManager();
        
        $etage = $em->getRepository('BUBibliothequeBundle:Rayon')->findRayonEtag($rayon->getId());
        
        if(empty($etage)){
                $message = "Aucune etagere n'est disponible";
            }
            else {
                $message = "Une ou des etageres sont disponibles pour ce rayon";
            }

            return $this->render('BUBibliothequeBundle:Rayon:etage.html.twig', array(
            'etages' => $etage,
            'form' => $form->createView(),
            'message' => $message,
            ));
    }
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rayons = $em->getRepository('BUBibliothequeBundle:Rayon')->findAll();

        return $this->render('BUBibliothequeBundle:Rayon:index.html.twig', array(
            'rayons' => $rayons,
        ));
    }

    /**
     * Creates a new Rayon entity.
     *
     */
    public function newAction(Request $request)
    {
        $rayon = new Rayon();
        $form = $this->createForm(RayonType::class, $rayon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rayon);
            $em->flush();

            return $this->redirectToRoute('rayon_show', array('id' => $rayon->getId()));
        }

        return $this->render('BUBibliothequeBundle:Rayon:new.html.twig', array(
            'rayon' => $rayon,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rayon entity.
     *
     */
    public function showAction(Rayon $rayon)
    {
        $deleteForm = $this->createDeleteForm($rayon);

        return $this->render('BUBibliothequeBundle:Rayon:show.html.twig', array(
            'rayon' => $rayon,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rayon entity.
     *
     */
    public function editAction(Request $request, Rayon $rayon)
    {
        $deleteForm = $this->createDeleteForm($rayon);
        $editForm = $this->createForm(RayonType::class, $rayon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rayon);
            $em->flush();

            return $this->redirectToRoute('rayon_edit', array('id' => $rayon->getId()));
        }

        return $this->render('BUBibliothequeBundle:Rayon:edit.html.twig', array(
            'rayon' => $rayon,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Rayon entity.
     *
     */
    public function deleteAction(Request $request, Rayon $rayon)
    {
        $form = $this->createDeleteForm($rayon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $etagere = $em->getRepository('BUBibliothequeBundle:Rayon')->CountEtagRayon($rayon->getId());
            if ($etagere <1){
                $em->remove($rayon);
                $em->flush();
            }
        }
        return $this->redirectToRoute('rayon_index');
    }

    /**
     * Creates a form to delete a Rayon entity.
     *
     * @param Rayon $rayon The Rayon entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rayon $rayon)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rayon_delete', array('id' => $rayon->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
