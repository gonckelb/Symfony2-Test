<?php

namespace Dive\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dive\PlatformBundle\Entity\CityRepository")
 */
class City
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\OneToMany(targetEntity="Dive\PlatformBundle\Entity\Center", mappedBy="city",  orphanRemoval=true, cascade={"all"})
    */
    private $centers;
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
     * @return City
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
     * Constructor
     */
    public function __construct()
    {
        $this->centers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add center
     *
     * @param \Dive\PlatformBundle\Entity\Center $center
     *
     * @return City
     */
    public function addCenter(\Dive\PlatformBundle\Entity\Center $center)
    {
        $this->centers[] = $center;
        $center->setCity($this);
        return $this;
    }

    /**
     * Remove center
     *
     * @param \Dive\PlatformBundle\Entity\Center $center
     */
    public function removeCenter(\Dive\PlatformBundle\Entity\Center $center)
    {
        $this->centers->removeElement($center);
    }

    /**
     * Get centers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCenters()
    {
        return $this->centers;
    }
    public function getNbAdherent()
    {
        $nb = 0;
        /** @var Center $center */
        foreach ($this->centers as $center)
        {
            $nb += $center->getAdherents()->count();
        }
        return $nb;
    }
}
