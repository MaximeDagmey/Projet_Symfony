<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Etagere
 */
class Etagere
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $numero;


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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Etagere
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }
    /**
     * @var \BU\BibliothequeBundle\Entity\Rayon
     */
    private $rayon;


    /**
     * Set rayon
     *
     * @param \BU\BibliothequeBundle\Entity\Rayon $rayon
     *
     * @return Etagere
     */
    public function setRayon(\BU\BibliothequeBundle\Entity\Rayon $rayon = null)
    {
        $this->rayon = $rayon;

        return $this;
    }

    /**
     * Get rayon
     *
     * @return \BU\BibliothequeBundle\Entity\Rayon
     */
    public function getRayon()
    {
        return $this->rayon;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livres;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add livre
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livre
     *
     * @return Etagere
     */
    public function addLivre(\BU\BibliothequeBundle\Entity\Livre $livre)
    {
        $this->livres[] = $livre;

        return $this;
    }

    /**
     * Remove livre
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livre
     */
    public function removeLivre(\BU\BibliothequeBundle\Entity\Livre $livre)
    {
        $this->livres->removeElement($livre);
    }

    /**
     * Get livres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivres()
    {
        return $this->livres;
    }
    
    public function __toString()
    {
        return strval($this->getNumero());
    }

    /**
     * Set livres
     *
     * @param \BU\BibliothequeBundle\Entity\Exemplaire $livres
     *
     * @return Etagere
     */
    public function setLivres(\BU\BibliothequeBundle\Entity\Exemplaire $livres = null)
    {
        $this->livres = $livres;

        return $this;
    }
}
