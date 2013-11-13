<?php

namespace Coipeault\CN\MegapolisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Step
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Coipeault\CN\MegapolisBundle\Entity\StepRepository")
 */
class Step {

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Building 
     * 
     * @ORM\ManyToOne(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Building")
     * @ORM\JoinColumn(nullable=false)
     */
    private $building;

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\StepMaterial
     * 
     * @ORM\OneToMany(targetEntity="Coipeault\CN\MegapolisBundle\Entity\StepMaterial", mappedBy="step")
     */
    private $stepMaterials;

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
     *  
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="out_of", type="integer")
     */
    private $outOf;

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
     * Set number
     *
     * @param string $number
     * @return Step
     */
    public function setNumber($number) {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber() {

        return $this->number;
    }

    /**
     * Set outOf
     *
     * @param integer $outOf
     * @return Step
     */
    public function setOutOf($outOf) {
        $this->outOf = $outOf;

        return $this;
    }

    /**
     * Get outOf
     *
     * @return integer 
     */
    public function getOutOf() {

        return $this->outOf;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Step
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
     * @return Step
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
     * @return Step
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
     * Set building
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Building $building
     * @return Step
     */
    public function setBuilding(\Coipeault\CN\MegapolisBundle\Entity\Building $building) {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return \Coipeault\CN\MegapolisBundle\Entity\Building 
     */
    public function getBuilding() {

        return $this->building;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->stepMaterials = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * 
     * @return type
     */
    public function __toString() {

        return $this->name;
    }

    /**
     * Add stepMaterials
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\StepMaterial $stepMaterials
     * @return Step
     */
    public function addStepMaterial(\Coipeault\CN\MegapolisBundle\Entity\StepMaterial $stepMaterials) {
        $this->stepMaterials[] = $stepMaterials;

        return $this;
    }

    /**
     * Remove stepMaterials
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\StepMaterial $stepMaterials
     */
    public function removeStepMaterial(\Coipeault\CN\MegapolisBundle\Entity\StepMaterial $stepMaterials) {
        $this->stepMaterials->removeElement($stepMaterials);
    }

    /**
     * Get stepMaterials
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStepMaterials() {
        return $this->stepMaterials;
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Step
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

}