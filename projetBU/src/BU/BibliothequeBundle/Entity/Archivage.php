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
     * @var \BU\BibliothequeBundle\Entity\Exemplaire
     */
    private $exemplaireempruntarch;

    /**
     * @var \BU\BibliothequeBundle\Entity\User
     */
    private $userarch;


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

    /**
     * Set exemplaireempruntarch
     *
     * @param \BU\BibliothequeBundle\Entity\Exemplaire $exemplaireempruntarch
     *
     * @return Archivage
     */
    public function setExemplaireempruntarch(\BU\BibliothequeBundle\Entity\Exemplaire $exemplaireempruntarch = null)
    {
        $this->exemplaireempruntarch = $exemplaireempruntarch;

        return $this;
    }

    /**
     * Get exemplaireempruntarch
     *
     * @return \BU\BibliothequeBundle\Entity\Exemplaire
     */
    public function getExemplaireempruntarch()
    {
        return $this->exemplaireempruntarch;
    }

    /**
     * Set userarch
     *
     * @param \BU\BibliothequeBundle\Entity\User $userarch
     *
     * @return Archivage
     */
    public function setUserarch(\BU\BibliothequeBundle\Entity\User $userarch = null)
    {
        $this->userarch = $userarch;

        return $this;
    }

    /**
     * Get userarch
     *
     * @return \BU\BibliothequeBundle\Entity\User
     */
    public function getUserarch()
    {
        return $this->userarch;
    }
}

