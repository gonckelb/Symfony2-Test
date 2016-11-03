<?php

namespace Dive\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Center
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dive\PlatformBundle\Entity\CenterRepository")
 */
class Center
{
    /**
    * @ORM\ManyToOne(targetEntity="Dive\PlatformBundle\Entity\City", inversedBy="centers")
    */
    private $city;

    /**
    * @ORM\ManyToMany(targetEntity="Dive\PlatformBundle\Entity\Adherents", mappedBy="centers", orphanRemoval=true, cascade={"all"})
    */
    private $adherents;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     *
     * @return Center
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set adherent
     *
     * @param \Dive\PlatformBundle\Entity\Adherent $adherent
     *
     * @return Center
     */
    public function setAdherent(\Dive\PlatformBundle\Entity\Adherent $adherent = null)
    {
        $this->adherent = $adherent;

        return $this;
    }

    /**
     * Get adherent
     *
     * @return \Dive\PlatformBundle\Entity\Adherent
     */
    public function getAdherent()
    {
        return $this->adherent;
    }

    /**
     * Add adherent
     *
     * @param \Dive\PlatformBundle\Entity\Adherents $adherent
     *
     * @return Center
     */
    public function addAdherent(\Dive\PlatformBundle\Entity\Adherents $adherent)
    {
        $this->adherents[] = $adherent;
        $adherent->addCenter($this);
        return $this;
    }

    /**
     * Remove adherent
     *
     * @param \Dive\PlatformBundle\Entity\Adherents $adherent
     */
    public function removeAdherent(\Dive\PlatformBundle\Entity\Adherents $adherent)
    {
        $this->adherents->removeElement($adherent);
    }

    /**
     * Get adherents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdherents()
    {
        return $this->adherents;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adherents = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set city
     *
     * @param \Dive\PlatformBundle\Entity\City $city
     *
     * @return Center
     */
    public function setCity(\Dive\PlatformBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Dive\PlatformBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }
}
