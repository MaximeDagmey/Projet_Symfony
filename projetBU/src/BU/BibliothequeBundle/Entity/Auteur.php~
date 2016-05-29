<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Auteur
 */
class Auteur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $nom;


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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Auteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livreauteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livreauteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add livreauteur
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livreauteur
     *
     * @return Auteur
     */
    public function addLivreauteur(\BU\BibliothequeBundle\Entity\Livre $livreauteur)
    {
        $this->livreauteur[] = $livreauteur;

        return $this;
    }

    /**
     * Remove livreauteur
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livreauteur
     */
    public function removeLivreauteur(\BU\BibliothequeBundle\Entity\Livre $livreauteur)
    {
        $this->livreauteur->removeElement($livreauteur);
    }

    /**
     * Get livreauteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivreauteur()
    {
        return $this->livreauteur;
    }
    
    public function __toString()
    {
        return $this->getNom()." ". $this->getPrenom();
    }
}
