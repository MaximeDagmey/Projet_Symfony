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
}
