<?php

namespace Dive\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adherents
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dive\PlatformBundle\Entity\AdherentsRepository")
 */
class Adherents
{


    /**
    * 
    * @ORM\ManyToMany(targetEntity="Dive\PlatformBundle\Entity\Center", inversedBy="adherents", orphanRemoval=true)
    */
    private $centers;

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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->date = new \Datetime();
    }
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
     * @return Adherents
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Adherents
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
     * Set city
     *
     * @param \Dive\PlatformBundle\Entity\City $city
     *
     * @return Adherents
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

    /**
     * Set center
     *
     * @param  \Dive\PlatformBundle\Entity\Center $center
     *
     * @return Adherents
     */
    public function setCenter(\Dive\PlatformBundle\Entity\Center $center = null)
    {
        $this->centers = $center;

        return $this;
    }

    /**
     * Get center
     *
     * @return \Dive\PlatformBundle\Entity\Center
     */
    public function getCenter()
    {
        return $this->centers;
    }

    /**
     * Add center
     *
     * @param \Dive\PlatformBundle\Entity\Center $center
     *
     * @return Adherents
     */
    public function addCenter(\Dive\PlatformBundle\Entity\Center $center)
    {
        $this->centers[] = $center;

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
}
