<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * Reservation
 */
class Reservation
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
     * @var \BU\BibliothequeBundle\Entity\Livre
     */
    private $livre;

    /**
     * @var \BU\BibliothequeBundle\Entity\User
     */
    private $user;


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
     * @return Reservation
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

    /**
     * Set livre
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $livre
     *
     * @return Reservation
     */
    public function setLivre(\BU\BibliothequeBundle\Entity\Livre $livre = null)
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
     * @return Reservation
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
}
