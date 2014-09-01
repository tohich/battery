<?php

namespace App\BatteryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BatteryBundle\Entity\Pack;
use App\BatteryBundle\Form\PackType;

/**
 * Pack controller.
 *
 */
class PackController extends Controller
{

    /**
     * Lists all Pack entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBatteryBundle:Pack')->getStatistics();

        return $this->render('AppBatteryBundle:Pack:index.html.twig', array(
            'entities' => $entities,
        ));

    }
    /**
     * Creates a new Pack entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pack();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('batterypack', array('id' => $entity->getId())));
        }

        return $this->render('AppBatteryBundle:Pack:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pack entity.
     *
     * @param Pack $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pack $entity)
    {
        $form = $this->createForm(new PackType(), $entity, array(
            'action' => $this->generateUrl('batterypack_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pack entity.
     *
     */
    public function newAction()
    {
        $entity = new Pack();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBatteryBundle:Pack:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

}
