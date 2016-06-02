<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Exemplaire
 */
class Exemplaire
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $désignation;

    /**
     * @var \BU\BibliothequeBundle\Entity\Etagere
     */
    private $etagere;

    /**
     * @var \BU\BibliothequeBundle\Entity\Livre
     */
    private $livreexemplaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livreemprunt = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set désignation
     *
     * @param string $désignation
     *
     * @return Exemplaire
     */
    public function setDésignation($désignation)
    {
        $this->désignation = $désignation;

        return $this;
    }

    /**
     * Get désignation
     *
     * @return string
     */
    public function getDésignation()
    {
        return $this->désignation;
    }

    /**
     * Set etagere
     *
     * @param \BU\BibliothequeBundle\Entity\Etagere $etagere
     *
     * @return Exemplaire
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
     * Set livreexemplaire
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livreexemplaire
     *
     * @return Exemplaire
     */
    public function setLivreexemplaire(\BU\BibliothequeBundle\Entity\Livre $livreexemplaire = null)
    {
        $this->livreexemplaire = $livreexemplaire;

        return $this;
    }

    /**
     * Get livreexemplaire
     *
     * @return \BU\BibliothequeBundle\Entity\Livre
     */
    public function getLivreexemplaire()
    {
        return $this->livreexemplaire;
    }
    /**
     * @var string
     */
    private $designation;


    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Exemplaire
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }
    
    public function __toString(){
        return $this->getDesignation()." ".$this->getLivreexemplaire();
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livreemprunt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livreempruntarch;


    /**
     * Add livreemprunt
     *
     * @param \BU\BibliothequeBundle\Entity\Emprunt $livreemprunt
     *
     * @return Exemplaire
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

    /**
     * Add livreempruntarch
     *
     * @param \BU\BibliothequeBundle\Entity\Archivage $livreempruntarch
     *
     * @return Exemplaire
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
