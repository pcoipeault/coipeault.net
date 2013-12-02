<?php

namespace Coipeault\CN\MegapolisBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BuildingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BuildingRepository extends EntityRepository {
    
    public function getTopTenBuilding() {
        $queryBuildr = $this->createQueryBuilder('b')
                            ->leftJoin('b.steps', 's')
                            ->leftJoin('s.stepMaterials', 'sm')
                            ->where('b.status = 0')
                            ->orderBy('b.id', 'ASC')
                            ->addSelect('s')
                            ->addSelect('sm');
        
        return $queryBuildr->getQuery()->getArrayResult();
    }
}
