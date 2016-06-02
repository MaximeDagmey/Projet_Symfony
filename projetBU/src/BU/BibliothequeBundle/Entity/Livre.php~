<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Livre
 */
class Livre
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $notice;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set notice
     *
     * @param string $notice
     *
     * @return Livre
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;

        return $this;
    }

    /**
     * Get notice
     *
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $themes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add theme
     *
     * @param \BU\BibliothequeBundle\Entity\Theme $theme
     *
     * @return Livre
     */
    public function addTheme(\BU\BibliothequeBundle\Entity\Theme $theme)
    {
        $this->themes[] = $theme;

        return $this;
    }

    /**
     * Remove theme
     *
     * @param \BU\BibliothequeBundle\Entity\Theme $theme
     */
    public function removeTheme(\BU\BibliothequeBundle\Entity\Theme $theme)
    {
        $this->themes->removeElement($theme);
    }

    /**
     * Get themes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getThemes()
    {
        return $this->themes;
    }
    /**
     * @var \BU\BibliothequeBundle\Entity\Etagere
     */
    private $etagere;


    /**
     * Set etagere
     *
     * @param \BU\BibliothequeBundle\Entity\Etagere $etagere
     *
     * @return Livre
     */
    public function setEtagere(\BU\BibliothequeBundle\Entity\Etagere $etagere = null)
    {
        $this->etagere = $etagere;

        return $this;
    }

    /**
     * Get etagere
     *
     * @return \BU\BibliothequeBundle\Entity\Etagere
     */
    public function getEtagere()
    {
        return $this->etagere;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livreemprunt;


    /**
     * Add livreemprunt
     *
     * @param \BU\BibliothequeBundle\Entity\Emprunt $livreemprunt
     *
     * @return Livre
     */
    public function addLivreemprunt(\BU\BibliothequeBundle\Entity\Emprunt $livreemprunt)
    {
        $this->livreemprunt[] = $livreemprunt;

        return $this;
    }

    /**
     * Remove livreemprunt
     *
     * @param \BU\BibliothequeBundle\Entity\Emprunt $livreemprunt
     */
    public function removeLivreemprunt(\BU\BibliothequeBundle\Entity\Emprunt $livreemprunt)
    {
        $this->livreemprunt->removeElement($livreemprunt);
    }

    /**
     * Get livreemprunt
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivreemprunt()
    {
        return $this->livreemprunt;
    }
    
    public function __toString(){
        return $this->getTitre();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $auteurs;


    /**
     * Add auteur
     *
     * @param \BU\BibliothequeBundle\Entity\Auteur $auteur
     *
     * @return Livre
     */
    public function addAuteur(\BU\BibliothequeBundle\Entity\Auteur $auteur)
    {
        $this->auteurs[] = $auteur;

        return $this;
    }

    /**
     * Remove auteur
     *
     * @param \BU\BibliothequeBundle\Entity\Auteur $auteur
     */
    public function removeAuteur(\BU\BibliothequeBundle\Entity\Auteur $auteur)
    {
        $this->auteurs->removeElement($auteur);
    }

    /**
     * Get auteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuteurs()
    {
        return $this->auteurs;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $exemplaires;


    /**
     * Add exemplaire
     *
     * @param \BU\BibliothequeBundle\Entity\Exemplaire $exemplaire
     *
     * @return Livre
     */
    public function addExemplaire(\BU\BibliothequeBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires[] = $exemplaire;

        return $this;
    }

    /**
     * Remove exemplaire
     *
     * @param \BU\BibliothequeBundle\Entity\Exemplaire $exemplaire
     */
    public function removeExemplaire(\BU\BibliothequeBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires->removeElement($exemplaire);
    }

    /**
     * Get exemplaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExemplaires()
    {
        return $this->exemplaires;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livrereservation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livreempruntarch;


    /**
     * Add livrereservation
     *
     * @param \BU\BibliothequeBundle\Entity\Reservation $livrereservation
     *
     * @return Livre
     */
    public function addLivrereservation(\BU\BibliothequeBundle\Entity\Reservation $livrereservation)
    {
        $this->livrereservation[] = $livrereservation;

        return $this;
    }

    /**
     * Remove livrereservation
     *
     * @param \BU\BibliothequeBundle\Entity\Reservation $livrereservation
     */
    public function removeLivrereservation(\BU\BibliothequeBundle\Entity\Reservation $livrereservation)
    {
        $this->livrereservation->removeElement($livrereservation);
    }

    /**
     * Get livrereservation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivrereservation()
    {
        return $this->livrereservation;
    }

    /**
     * Add livreempruntarch
     *
     * @param \BU\BibliothequeBundle\Entity\Archivage $livreempruntarch
     *
     * @return Livre
     */
    public function addLivreempruntarch(\BU\BibliothequeBundle\Entity\Archivage $livreempruntarch)
    {
        $this->livreempruntarch[] = $livreempruntarch;

        return $this;
    }

    /**
     * Remove livreempruntarch
     *
     * @param \BU\BibliothequeBundle\Entity\Archivage $livreempruntarch
     */
    public function removeLivreempruntarch(\BU\BibliothequeBundle\Entity\Archivage $livreempruntarch)
    {
        $this->livreempruntarch->removeElement($livreempruntarch);
    }

    /**
     * Get livreempruntarch
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivreempruntarch()
    {
        return $this->livreempruntarch;
    }
}
