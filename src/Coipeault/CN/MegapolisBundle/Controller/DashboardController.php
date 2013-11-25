<?php

namespace   Coipeault\CN\MegapolisBundle\Controller;

use         Symfony\Component\HttpFoundation\Request;
use         Symfony\Bundle\FrameworkBundle\Controller\Controller;
use         Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use         Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use         Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
    public function indexAction () {
        $em = $this->getDoctrine()->getManager();
        
//        $buildings = $em->getRepository('CoipeaultCNMegapolisBundle:Building')->getTopTenBuilding();
        $buildings = $em->getRepository('CoipeaultCNMegapolisBundle:Building')->findBy(array('status' => 0), array('id' => 'ASC'), 10);
        
        return array(
            'buildings' => $buildings,
        );
    }
}
