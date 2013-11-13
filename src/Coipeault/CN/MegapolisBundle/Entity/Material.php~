<?php

namespace Coipeault\CN\MegapolisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Coipeault\CN\MegapolisBundle\Entity\MaterialRepository")
 */
class Material {

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\StepMaterial
     * 
     * @ORM\OneToMany(targetEntity="Coipeault\CN\MegapolisBundle\Entity\StepMaterial", mappedBy="step")
     */
    private $stepMaterials;

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Stock
     * 
     * @ORM\ManyToOne(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Stock")
     */
    private $stock;

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Warehouse
     * 
     * @ORM\ManyToOne(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Warehouse")
     */
    private $warehouse;

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Wishlist
     * 
     * @ORM\ManyToOne(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Wishlist")
     */
    private $wishlist;

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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

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
     * @return Material
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
     * Set price
     *
     * @param integer $price
     * @return Material
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice() {

        return $this->price;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Material
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
     * @return Material
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
        $this->stepMaterials = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    
    public function __toString() {
        
        return $this->name;
    }

    /**
     * Add stepMaterials
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\StepMaterial $stepMaterials
     * @return Material
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
     * Set stock
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Stock $stock
     * @return Material
     */
    public function setStock(\Coipeault\CN\MegapolisBundle\Entity\Stock $stock = null) {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return \Coipeault\CN\MegapolisBundle\Entity\Stock 
     */
    public function getStock() {
        
        return $this->stock;
    }

    /**
     * Set warehouse
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Warehouse $warehouse
     * @return Material
     */
    public function setWarehouse(\Coipeault\CN\MegapolisBundle\Entity\Warehouse $warehouse = null) {
        $this->warehouse = $warehouse;

        return $this;
    }

    /**
     * Get warehouse
     *
     * @return \Coipeault\CN\MegapolisBundle\Entity\Warehouse 
     */
    public function getWarehouse() {
        
        return $this->warehouse;
    }

    /**
     * Set wishlist
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Wishlist $wishlist
     * @return Material
     */
    public function setWishlist(\Coipeault\CN\MegapolisBundle\Entity\Wishlist $wishlist = null) {
        $this->wishlist = $wishlist;

        return $this;
    }

    /**
     * Get wishlist
     *
     * @return \Coipeault\CN\MegapolisBundle\Entity\Wishlist 
     */
    public function getWishlist() {
        
        return $this->wishlist;
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->updatedAt = new \DateTime();
    }

}