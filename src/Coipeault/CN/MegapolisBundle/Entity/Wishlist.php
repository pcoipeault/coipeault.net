<?php

namespace Coipeault\CN\MegapolisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wishlist
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Coipeault\CN\MegapolisBundle\Entity\WishlistRepository")
 */
class Wishlist {

    /**
     * @var \Coipeault\CN\MegapolisBundle\Entity\Material
     * 
     * @ORM\OneToMany(targetEntity="Coipeault\CN\MegapolisBundle\Entity\Material", mappedBy="wishlist")
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
    public function getId() {

        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Wishlist
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
     * Constructor
     */
    public function __construct() {
        $this->materials = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add materials
     *
     * @param \Coipeault\CN\MegapolisBundle\Entity\Material $materials
     * @return Wishlist
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