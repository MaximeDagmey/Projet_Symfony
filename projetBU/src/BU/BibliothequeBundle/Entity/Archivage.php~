<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Archivage
 */
class Archivage
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Archivage
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    private $livre;

    /**
     * @var \BU\BibliothequeBundle\Entity\User
     */
    private $user;


    /**
     * Set livre
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livre
     *
     * @return Archivage
     */
    public function setLivre(\BU\BibliothequeBundle\Entity\Exemplaire $livre = null)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return \BU\BibliothequeBundle\Entity\Livre
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set user
     *
     * @param \BU\BibliothequeBundle\Entity\User $user
     *
     * @return Archivage
     */
    public function setUser(\BU\BibliothequeBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BU\BibliothequeBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var \DateTime
     */
    private $dateretour;


    /**
     * Set dateretour
     *
     * @param \DateTime $dateretour
     *
     * @return Archivage
     */
    public function setDateretour($dateretour)
    {
        $this->dateretour = $dateretour;

        return $this;
    }

    /**
     * Get dateretour
     *
     * @return \DateTime
     */
    public function getDateretour()
    {
        return $this->dateretour;
    }
}
