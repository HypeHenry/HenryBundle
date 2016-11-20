<?php

namespace ToolsforeverBundle\Controller;

use ToolsforeverBundle\Entity\Klant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Klant controller.
 *
 * @Route("klant")
 */
class KlantController extends Controller
{
    /**
     * Lists all klant entities.
     *
     * @Route("/", name="klant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $klants = $em->getRepository('ToolsforeverBundle:Klant')->findAll();

        return $this->render('@Toolsforever/klant/index.html.twig', array(
            'klants' => $klants,
        ));
    }

    /**
     * Creates a new klant entity.
     *
     * @Route("/new", name="klant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $klant = new Klant();
        $form = $this->createForm('ToolsforeverBundle\Form\KlantType', $klant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($klant);
            $em->flush($klant);

            return $this->redirectToRoute('klant_show', array('id' => $klant->getId()));
        }

        return $this->render('@Toolsforever/klant/new.html.twig', array(
            'klant' => $klant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a klant entity.
     *
     * @Route("/{id}", name="klant_show")
     * @Method("GET")
     */
    public function showAction(Klant $klant)
    {
        $deleteForm = $this->createDeleteForm($klant);

        return $this->render('@Toolsforever/klant/show.html.twig', array(
            'klant' => $klant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing klant entity.
     *
     * @Route("/{id}/edit", name="klant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Klant $klant)
    {
        $deleteForm = $this->createDeleteForm($klant);
        $editForm = $this->createForm('ToolsforeverBundle\Form\KlantType', $klant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('klant_edit', array('id' => $klant->getId()));
        }

        return $this->render('@Toolsforever/klant/edit.html.twig', array(
            'klant' => $klant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a klant entity.
     *
     * @Route("/{id}", name="klant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Klant $klant)
    {
        $form = $this->createDeleteForm($klant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($klant);
            $em->flush($klant);
        }

        return $this->redirectToRoute('klant_index');
    }

    /**
     * Creates a form to delete a klant entity.
     *
     * @param Klant $klant The klant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Klant $klant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('klant_delete', array('id' => $klant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
