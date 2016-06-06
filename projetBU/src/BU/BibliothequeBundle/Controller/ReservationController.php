<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Reservation;
use BU\BibliothequeBundle\Form\ReservationType;

/**
 * Reservation controller.
 *
 */
class ReservationController extends Controller
{
    /**
     * Lists all Reservation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('BUBibliothequeBundle:Reservation')->findAll();

        return $this->render('BUBibliothequeBundle:Reservation:index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new Reservation entity.
     *
     */
    public function newAction(Request $request)
    {        
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $date = new \Datetime('now');
        $form->get('date')->setData($date);
        $user= $this->getUser();
        $form->get('user')->setData($user);
        $form->handleRequest($request);
        $message = null;

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $exemplaires = $em->getRepository('BUBibliothequeBundle:Exemplaire')->findExemplaireLivre($reservation->getLivre()->getTitre());
            $reservations = $em->getRepository('BUBibliothequeBundle:Reservation')->findReservationLivre($reservation->getLivre()->getTitre());
            if($reservation->getUser()->getCycle() == 1)
            {
              $useremp = $em->getRepository('BUBibliothequeBundle:Emprunt')->findEmpuser($reservation->getUser());
              if($useremp >= 5)
              {
                 $message = "L'utilisateur ne peut plus faire de réservation";
                 return $this->render('BUBibliothequeBundle:Reservation:new.html.twig', array('reservation' => $reservation,'form' => $form->createView(),'message' => $message,));
              }
            }
            if( $reservations >= $exemplaires )
            {
                $message = "Le livre n'est pas disponible";
                 return $this->render('BUBibliothequeBundle:Reservation:new.html.twig', array('reservation' => $reservation,'form' => $form->createView(),'message' => $message,));
            }
            else 
               
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('reservation_show', array('id' => $reservation->getId()));
        }

        return $this->render('BUBibliothequeBundle:Reservation:new.html.twig', array('reservation' => $reservation,'form' => $form->createView(),'message' => $message,));
    }
    
    public function SearchByUserAction($id)
    {        
        $message = "Listes de vos réservations";
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository('BUBibliothequeBundle:Reservation')->getListeReservationsByUserId($id);
        
        return $this->render('BUBibliothequeBundle:Reservation:search.html.twig', array('reservations' => $reservations, 'message' => $message,));
    }

    /**
     * Finds and displays a Reservation entity.
     *
     */
    public function showAction(Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('BUBibliothequeBundle:Reservation:show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reservation entity.
     *
     */
    public function editAction(Request $request, Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm(ReservationType::class, $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('reservation_edit', array('id' => $reservation->getId()));
        }

        return $this->render('BUBibliothequeBundle:Reservation:edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Reservation entity.
     *
     */
    public function deleteAction(Request $request, Reservation $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('reservation_index');
    }

    /**
     * Creates a form to delete a Reservation entity.
     *
     * @param Reservation $reservation The Reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
