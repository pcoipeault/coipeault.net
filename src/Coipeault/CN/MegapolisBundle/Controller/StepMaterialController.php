<?php

namespace Coipeault\CN\MegapolisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Coipeault\CN\MegapolisBundle\Entity\StepMaterial;
use Coipeault\CN\MegapolisBundle\Form\StepMaterialType;

/**
 * StepMaterial controller.
 *
 * @Route("/stepmaterial")
 */
class StepMaterialController extends Controller {

    /**
     * Lists all StepMaterial entities.
     *
     * @Route("/", name="stepmaterial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CoipeaultCNMegapolisBundle:StepMaterial')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new StepMaterial entity.
     *
     * @Route("/", name="stepmaterial_create")
     * @Method("POST")
     * @Template("CoipeaultCNMegapolisBundle:StepMaterial:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new StepMaterial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $nextAction = $form->get('saveAndAdd')->isClicked() ? 'stepmaterial_new' : 'stepmaterial_show';
            $reference = ($nextAction == 'stepmaterial_show') ? array('id' => $entity->getId()) : array();
            
            return $this->redirect($this->generateUrl($nextAction, $reference));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a StepMaterial entity.
     *
     * @param StepMaterial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(StepMaterial $entity) {
        $form = $this->createForm(new StepMaterialType(), $entity, array(
            'action' => $this->generateUrl('stepmaterial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new StepMaterial entity.
     *
     * @Route("/new", name="stepmaterial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new StepMaterial();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a StepMaterial entity.
     *
     * @Route("/{id}", name="stepmaterial_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoipeaultCNMegapolisBundle:StepMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StepMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing StepMaterial entity.
     *
     * @Route("/{id}/edit", name="stepmaterial_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoipeaultCNMegapolisBundle:StepMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StepMaterial entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a StepMaterial entity.
     *
     * @param StepMaterial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(StepMaterial $entity) {
        $form = $this->createForm(new StepMaterialType(), $entity, array(
            'action' => $this->generateUrl('stepmaterial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing StepMaterial entity.
     *
     * @Route("/{id}", name="stepmaterial_update")
     * @Method("PUT")
     * @Template("CoipeaultCNMegapolisBundle:StepMaterial:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoipeaultCNMegapolisBundle:StepMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StepMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('stepmaterial_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a StepMaterial entity.
     *
     * @Route("/{id}", name="stepmaterial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CoipeaultCNMegapolisBundle:StepMaterial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find StepMaterial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('stepmaterial'));
    }

    /**
     * Creates a form to delete a StepMaterial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('stepmaterial_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Delete'))
                    ->getForm()
        ;
    }

}
