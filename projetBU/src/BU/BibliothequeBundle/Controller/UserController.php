<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\User;
use BU\BibliothequeBundle\Form\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('BUBibliothequeBundle:User')->findAll();

        return $this->render('BUBibliothequeBundle:User:index.html.twig', array('users' => $users,));
    }
    
    public function SearchApproAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->remove('prenom');
        $form->remove('password');
        $form->remove('cycle');
        $form->remove('faculte');
        $form->handleRequest($request);
        $results = null;
        $message = null;
        $nbresults = null;

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $results = $em->getRepository('BUBibliothequeBundle:User')->findUserByNomApproximatif($user->getNom());
            if(empty($results))
            {
                $message = "Aucun utilisateur connu pour cette partie de nom";
            }
            else
            {
                $nbresults = count($results);
                if ($nbresults > 1) 
                {
                    $message = strval($nbresults)." résultats trouvés :";
                }
                else 
                {
                    $message = strval($nbresults)." seul résultat trouvé :";
                }

            }

            return $this->render('BUBibliothequeBundle:User:FindByNomApproximatif.html.twig', array('results' => $results,'form' => $form->createView(),'message' => $message,));
        }

        return $this->render('BUBibliothequeBundle:User:FindByNomApproximatif.html.twig', array('results' => $results,'form' => $form->createView(),'message' => $message,));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('BUBibliothequeBundle:User:new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        
        $em = $this->getDoctrine()->getManager();
        $emprunts = $em->getRepository('BUBibliothequeBundle:User')->getListeEmpruntsByUserId($user->getId());
        
        return $this->render('BUBibliothequeBundle:User:show.html.twig', array('user' => $user,'delete_form' => $deleteForm->createView(), 'emprunts' => $emprunts,));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm(UserType::class, $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('BUBibliothequeBundle:User:edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
