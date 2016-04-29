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
}
