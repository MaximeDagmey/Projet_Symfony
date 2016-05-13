<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Theme
 */
class Theme
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;


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
     * Set description
     *
     * @param string $description
     *
     * @return Theme
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rayons;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $livretheme;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rayons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->livretheme = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rayon
     *
     * @param \BU\BibliothequeBundle\Entity\Rayon $rayon
     *
     * @return Theme
     */
    public function addRayon(\BU\BibliothequeBundle\Entity\Rayon $rayon)
    {
        $this->rayons[] = $rayon;

        return $this;
    }

    /**
     * Remove rayon
     *
     * @param \BU\BibliothequeBundle\Entity\Rayon $rayon
     */
    public function removeRayon(\BU\BibliothequeBundle\Entity\Rayon $rayon)
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

    /**
     * Add livretheme
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livretheme
     *
     * @return Theme
     */
    public function addLivretheme(\BU\BibliothequeBundle\Entity\Livre $livretheme)
    {
        $this->livretheme[] = $livretheme;

        return $this;
    }

    /**
     * Remove livretheme
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livretheme
     */
    public function removeLivretheme(\BU\BibliothequeBundle\Entity\Livre $livretheme)
    {
        $this->livretheme->removeElement($livretheme);
    }

    /**
     * Get livretheme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivretheme()
    {
        return $this->livretheme;
    }
}
