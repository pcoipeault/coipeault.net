<?php

namespace Coipeault\CN\MegapolisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StepMaterial
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Coipeault\CN\MegapolisBundle\Entity\StepMaterialRepository")
 */
class StepMaterial {

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Step 
     * 
     * @ORM\ManyToOne(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Step")
     * @ORM\JoinColumn(nullable=false)
     */
    private $step;

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Material
     * 
     * @ORM\ManyToOne(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Material")
     * @ORM\JoinColumn(nullable=false)
     */
    private $material;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="realized", type="integer")
     */
    private $realized;

    /**
     * @var integer
     *
     * @ORM\Column(name="out_of", type="integer")
     */
    private $outOf;

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
     * Set realized
     *
     * @param integer $realized
     * @return StepMaterial
     */
    public function setRealized($realized) {
        $this->realized = $realized;

        return $this;
    }

    /**
     * Get realized
     *
     * @return integer 
     */
    public function getRealized() {

        return $this->realized;
    }

    /**
     * Set outOf
     *
     * @param integer $outOf
     * @return StepMaterial
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return StepMaterial
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
     * @return StepMaterial
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
     * Set step
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Step $step
     * @return StepMaterial
     */
    public function setStep(\Coipeault\CN\MegapolisBundle\Entity\Step $step) {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return \Coipeault\CN\MegapolisBundle\Entity\Step 
     */
    public function getStep() {

        return $this->step;
    }

    /**
     * Set material
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Material $material
     * @return StepMaterial
     */
    public function setMaterial(\Coipeault\CN\MegapolisBundle\Entity\Material $material) {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return \Coipeault\CN\MegapolisBundle\Entity\Material 
     */
    public function getMaterial() {
        
        return $this->material;
    }
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->updatedAt = new \DateTime();
    }

}