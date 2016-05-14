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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $empruntlivre;


    /**
     * Add empruntlivre
     *
     * @param \BU\BibliothequeBundle\Entity\Emprunt $empruntlivre
     *
     * @return Livre
     */
    public function addEmpruntlivre(\BU\BibliothequeBundle\Entity\Emprunt $empruntlivre)
    {
        $this->empruntlivre[] = $empruntlivre;

        return $this;
    }

    /**
     * Remove empruntlivre
     *
     * @param \BU\BibliothequeBundle\Entity\Emprunt $empruntlivre
     */
    public function removeEmpruntlivre(\BU\BibliothequeBundle\Entity\Emprunt $empruntlivre)
    {
        $this->empruntlivre->removeElement($empruntlivre);
    }

    /**
     * Get empruntlivre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmpruntlivre()
    {
        return $this->empruntlivre;
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
}
