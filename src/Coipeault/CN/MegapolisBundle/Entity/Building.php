<?php

namespace Coipeault\CN\MegapolisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Building
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Coipeault\CN\MegapolisBundle\Entity\BuildingRepository")
 */
class Building {

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Step
     * 
     * @ORM\OneToMany(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Step", mappedBy="building")
     */
    private $steps;

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
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {

        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Building
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {

        return $this->name;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Building
     */
    public function setLocation($location) {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation() {

        return $this->location;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Building
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus() {

        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Building
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {

        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Building
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt() {

        return $this->updatedAt;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->steps = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() {
        
        return $this->name . ' -- ' . $this->location;
    }

    /**
     * Add steps
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Step $steps
     * @return Building
     */
    public function addStep(\Coipeault\CN\MegapolisBundle\Entity\Step $steps) {
        $this->steps[] = $steps;

        return $this;
    }

    /**
     * Remove steps
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Step $steps
     */
    public function removeStep(\Coipeault\CN\MegapolisBundle\Entity\Step $steps) {
        $this->steps->removeElement($steps);
    }

    /**
     * Get steps
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSteps() {
        return $this->steps;
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->updatedAt = new \DateTime();
    }

}