<?php

namespace Emagister\BannersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Emagister\BannersBundle\Entity\Advertiser;
use Emagister\BannersBundle\Form\AdvertiserType;

/**
 * Advertiser controller.
 *
 * @Route("/advertiser")
 */
class AdvertiserController extends Controller
{
    /**
     * Lists all Advertiser entities.
     *
     * @Route("/", name="advertiser")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('EmagisterBannersBundle:Advertiser')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Advertiser entity.
     *
     * @Route("/{id}/show", name="advertiser_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('EmagisterBannersBundle:Advertiser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Advertiser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Advertiser entity.
     *
     * @Route("/new", name="advertiser_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Advertiser();
        $form   = $this->createForm(new AdvertiserType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Advertiser entity.
     *
     * @Route("/create", name="advertiser_create")
     * @Method("post")
     * @Template("EmagisterBannersBundle:Advertiser:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Advertiser();
        $request = $this->getRequest();
        $form    = $this->createForm(new AdvertiserType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('advertiser_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Advertiser entity.
     *
     * @Route("/{id}/edit", name="advertiser_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('EmagisterBannersBundle:Advertiser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Advertiser entity.');
        }

        $editForm = $this->createForm(new AdvertiserType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Advertiser entity.
     *
     * @Route("/{id}/update", name="advertiser_update")
     * @Method("post")
     * @Template("EmagisterBannersBundle:Advertiser:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('EmagisterBannersBundle:Advertiser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Advertiser entity.');
        }

        $editForm   = $this->createForm(new AdvertiserType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('advertiser_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Advertiser entity.
     *
     * @Route("/{id}/delete", name="advertiser_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('EmagisterBannersBundle:Advertiser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Advertiser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('advertiser'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
