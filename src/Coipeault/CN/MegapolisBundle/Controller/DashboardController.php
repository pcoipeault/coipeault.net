<?php

namespace Coipeault\CN\MegapolisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Description of DashboardController
 *
 * @author pako
 * 
 * @Route("/")
 */
class DashboardController extends Controller {

    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $buildings = $em->getRepository('CoipeaultCNMegapolisBundle:Building')->getTopTenBuilding();
        
        $temp = array();
        $topten = array();
        $temp = $buildings;

        foreach ($temp as $key => $building) {
            $building['done'] = 0;
            $building['total'] = 0;
            (float) $building['percentile'] = 0;

            foreach ($building['steps'] as $step) {
                $step['realized_count'] = 0;
                $step['total_count'] = 0;

                foreach ($step['stepMaterials'] as $stepmaterial) {
                    $step['realized_count'] += $stepmaterial['realized'];
                    $step['total_count'] += $stepmaterial['outOf'];
                }
                
                $building['done'] += ($step['status'] === 1) ? 
                        $building['done'] + 1 : ($step['status'] === FALSE && $step['total_count'] > 0) ? 
                        ($step['realized_count'] / $step['total_count']) : 0;
                $building['total'] =  $building['total'] + 1;
            }
            
            $building['percentile'] = $building['total'] > 0 ? $building['done'] / $building['total'] : 0;
            $topten[] = $building;
        }
        
        usort($topten, function($a, $b) {
            return $a['percentile'] < $b['percentile'];
        });
        
        $topten = array_slice($topten, 0, 10);

        return array(
            'buildings' => $topten,
        );
    }
    
}
