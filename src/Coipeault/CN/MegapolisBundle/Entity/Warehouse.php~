<?php

namespace Coipeault\CN\MegapolisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warehouse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Coipeault\CN\MegapolisBundle\Entity\WarehouseRepository")
 */
class Warehouse {

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Material
     * 
     * @ORM\OneToMany(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Material", mappedBy="warehouse")
     */
    private $materials;

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
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        
        return $this->id;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Warehouse
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity() {
        
        return $this->quantity;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->materials = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add materials
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Material $materials
     * @return Warehouse
     */
    public function addMaterial(\Coipeault\CN\MegapolisBundle\Entity\Material $materials) {
        $this->materials[] = $materials;

        return $this;
    }

    /**
     * Remove materials
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Material $materials
     */
    public function removeMaterial(\Coipeault\CN\MegapolisBundle\Entity\Material $materials) {
        $this->materials->removeElement($materials);
    }

    /**
     * Get materials
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMaterials() {
        
        return $this->materials;
    }

}