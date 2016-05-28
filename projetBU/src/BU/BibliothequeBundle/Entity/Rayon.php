<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Rayon
 */
class Rayon
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $designation;


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
     * Set designation
     *
     * @param string $designation
     *
     * @return Rayon
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rayons;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rayons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rayon
     *
     * @param \BU\BibliothequeBundle\Entity\Etagere $rayon
     *
     * @return Rayon
     */
    public function addRayon(\BU\BibliothequeBundle\Entity\Etagere $rayon)
    {
        $this->rayons[] = $rayon;

        return $this;
    }

    /**
     * Remove rayon
     *
     * @param \BU\BibliothequeBundle\Entity\Etagere $rayon
     */
    public function removeRayon(\BU\BibliothequeBundle\Entity\Etagere $rayon)
    {
        $this->rayons->removeElement($rayon);
    }

    /**
     * Get rayons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRayons()
    {
        return $this->rayons;
    }
    
    public function __toString()
    {
        return $this->getDesignation();
    }
}
