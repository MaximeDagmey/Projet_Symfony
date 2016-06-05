<?php

namespace BU\BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BU\BibliothequeBundle\Entity\Livre;
use BU\BibliothequeBundle\Form\LivreType;
use BU\BibliothequeBundle\Entity\Auteur;
use BU\BibliothequeBundle\Form\AuteurType;
use BU\BibliothequeBundle\Entity\Theme;
use BU\BibliothequeBundle\Form\ThemeType;

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

        return $this->render('BUBibliothequeBundle:Livre:index.html.twig', array(
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
    
    public function GetLivresByAuteurAction(Request $request)
    {   
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->remove('livreauteur');
        $form->handleRequest($request);
        $livres = null;
        $message = null;
        $titre = "Recherche de livres par auteur";

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $Listeauteur = $em->getRepository('BUBibliothequeBundle:Auteur')->findAuteur($auteur->getNom(), $auteur->getPrenom());            
            foreach ($Listeauteur as $auteur)
            {
                $ListeLivre = $auteur->getLivreauteur() ;
                foreach ($ListeLivre as $livre)
                {
                    $livres[count($livres)+1] = $livre;
                }
            }
            if (count($livres)>0)  $livres = array_unique($livres);  
            
            if(empty($livres))
            {
                $message = "Aucun livre connu pour cet auteur";
            }
            else
            {
                $nblivres = count($livres);
                if ($nblivres > 1) 
                {
                    $message = strval($nblivres)." résultats trouvés :";
                }
                else 
                {
                    $message = strval($nblivres)." seul résultat trouvé :";
                }

            }

            return $this->render('BUBibliothequeBundle:Livre:search.html.twig', array('livres' => $livres,'form' => $form->createView(),'message' => $message, 'titre' => $titre,));
        }

        return $this->render('BUBibliothequeBundle:Livre:search.html.twig', array('livres' => $livres,'form' => $form->createView(),'message' => $message, 'titre' => $titre,));
    }
    
    public function GetLivresByTitreApproximatifAction(Request $request)
    {   
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->remove('notice');
        $form->remove('themes');
        $form->handleRequest($request);
        $livres = null;
        $message = null;
        $titre = "Recherche de livre par titre";

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $livres = $em->getRepository('BUBibliothequeBundle:Livre')->findLivreByTitreApproximatif($livre->getTitre());
            if(empty($livres))
            {
                $message = "Aucun livre connu pour ce titre";
            }
            else
            {
                $nblivres = count($livres);
                if ($nblivres > 1) 
                {
                    $message = strval($nblivres)." résultats trouvés :";
                }
                else 
                {
                    $message = strval($nblivres)." seul résultat trouvé :";
                }

            }

            return $this->render('BUBibliothequeBundle:Livre:search.html.twig', array('livres' => $livres,'form' => $form->createView(),'message' => $message, 'titre' => $titre,));
        }

        return $this->render('BUBibliothequeBundle:Livre:search.html.twig', array('livres' => $livres,'form' => $form->createView(),'message' => $message, 'titre' => $titre,));
    }
    
    public function GetLivresByThemeAction(Request $request)
    {
        //$theme = new Theme();
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->remove('notice');
        $form->remove('titre');
        $form->handleRequest($request);
        $livres = null;
        $message = null;
        $Listetheme = null;
        $titre = "Recherche de livre par theme";
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $Listetheme = $em->getRepository('BUBibliothequeBundle:Theme')->findTheme($livre->getThemes());
        
            foreach ($Listetheme as $theme)
            {
                $ListeLivre = $theme->getLivretheme() ;
                foreach ($ListeLivre as $livre)
                {
                    $livres[count($livres)+1] = $livre;
                }
            }
           if (count($livres)>0)  $livres = array_unique($livres);     
            
            if(empty($livres))
            {
                $message = "Aucun livre connu pour ce theme";
            }
            else
            {
                $nblivres = count($livres);
                if ($nblivres > 1) 
                {
                    $message = strval($nblivres)." résultats trouvés :";
                }
                else 
                {
                    $message = strval($nblivres)." seul résultat trouvé :";
                }

            }

            return $this->render('BUBibliothequeBundle:Livre:search.html.twig', array('livres' => $livres,'form' => $form->createView(),'message' => $message, 'titre' => $titre,));
        }

        return $this->render('BUBibliothequeBundle:Livre:search.html.twig', array('livres' => $livres,'form' => $form->createView(),'message' => $message, 'titre' => $titre,));
    }
    
}
