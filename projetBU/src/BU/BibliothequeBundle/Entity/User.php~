<?php

namespace BU\BibliothequeBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $password;

    /**
     * @var int
     */
    private $cycle;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
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
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set cycle
     *
     * @param integer $cycle
     *
     * @return User
     */
    public function setCycle($cycle)
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * Get cycle
     *
     * @return int
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * @var \BU\BibliothequeBundle\Entity\Faculte
     */
    private $faculte;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emprunts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emprunts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set faculte
     *
     * @param \BU\BibliothequeBundle\Entity\Faculte $faculte
     *
     * @return User
     */
    public function setFaculte(\BU\BibliothequeBundle\Entity\Faculte $faculte = null)
    {
        $this->faculte = $faculte;

        return $this;
    }

    /**
     * Get faculte
     *
     * @return \BU\BibliothequeBundle\Entity\Faculte
     */
    public function getFaculte()
    {
        return $this->faculte;
    }

    /**
     * Add emprunt
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $emprunt
     *
     * @return User
     */
    public function addEmprunt(\BU\BibliothequeBundle\Entity\Livre $emprunt)
    {
        $this->emprunts[] = $emprunt;

        return $this;
    }

    /**
     * Remove emprunt
     *
     * @param \BU\BibliothequeBundle\Entity\Livre $emprunt
     */
    public function removeEmprunt(\BU\BibliothequeBundle\Entity\Livre $emprunt)
    {
        $this->emprunts->removeElement($emprunt);
    }

    /**
     * Get emprunts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmprunts()
    {
        return $this->emprunts;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $empruntuser;


    /**
     * Add empruntuser
     *
     * @param \BU\BibliothequeBundle\Entity\Emprunt $empruntuser
     *
     * @return User
     */
    public function addEmpruntuser(\BU\BibliothequeBundle\Entity\Emprunt $empruntuser)
    {
        $this->empruntuser[] = $empruntuser;

        return $this;
    }

    /**
     * Remove empruntuser
     *
     * @param \BU\BibliothequeBundle\Entity\Emprunt $empruntuser
     */
    public function removeEmpruntuser(\BU\BibliothequeBundle\Entity\Emprunt $empruntuser)
    {
        $this->empruntuser->removeElement($empruntuser);
    }

    /**
     * Get empruntuser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmpruntuser()
    {
        return $this->empruntuser;
    }
    /**
     * @var \BU\BibliothequeBundle\Entity\Role
     */
    private $role;


    /**
     * Set role
     *
     * @param \BU\BibliothequeBundle\Entity\Role $role
     *
     * @return User
     */
    public function setRole(\BU\BibliothequeBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \BU\BibliothequeBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }
    
    public function __toString()
    {
        return $this->getNom()." ". $this->getPrenom();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $empruntuserarch;


    /**
     * Add empruntuserarch
     *
     * @param \BU\BibliothequeBundle\Entity\Archivage $empruntuserarch
     *
     * @return User
     */
    public function addEmpruntuserarch(\BU\BibliothequeBundle\Entity\Archivage $empruntuserarch)
    {
        $this->empruntuserarch[] = $empruntuserarch;

        return $this;
    }

    /**
     * Remove empruntuserarch
     *
     * @param \BU\BibliothequeBundle\Entity\Archivage $empruntuserarch
     */
    public function removeEmpruntuserarch(\BU\BibliothequeBundle\Entity\Archivage $empruntuserarch)
    {
        $this->empruntuserarch->removeElement($empruntuserarch);
    }

    /**
     * Get empruntuserarch
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmpruntuserarch()
    {
        return $this->empruntuserarch;
    }
}
