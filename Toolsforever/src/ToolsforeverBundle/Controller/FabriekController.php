<?php

namespace ToolsforeverBundle\Controller;

use ToolsforeverBundle\Entity\Fabriek;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Fabriek controller.
 *
 * @Route("fabriek")
 */
class FabriekController extends Controller
{
    /**
     * Lists all fabriek entities.
     *
     * @Route("/", name="fabriek_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fabrieks = $em->getRepository('ToolsforeverBundle:Fabriek')->findAll();

        return $this->render('@Toolsforever/fabriek/index.html.twig', array(
            'fabrieks' => $fabrieks,
        ));
    }

    /**
     * Creates a new fabriek entity.
     *
     * @Route("/new", name="fabriek_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fabriek = new Fabriek();
        $form = $this->createForm('ToolsforeverBundle\Form\FabriekType', $fabriek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fabriek);
            $em->flush($fabriek);

            return $this->redirectToRoute('fabriek_show', array('id' => $fabriek->getId()));
        }

        return $this->render('@Toolsforever/fabriek/new.html.twig', array(
            'fabriek' => $fabriek,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fabriek entity.
     *
     * @Route("/{id}", name="fabriek_show")
     * @Method("GET")
     */
    public function showAction(Fabriek $fabriek)
    {
        $deleteForm = $this->createDeleteForm($fabriek);

        return $this->render('@Toolsforever/fabriek/show.html.twig', array(
            'fabriek' => $fabriek,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fabriek entity.
     *
     * @Route("/{id}/edit", name="fabriek_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Fabriek $fabriek)
    {
        $deleteForm = $this->createDeleteForm($fabriek);
        $editForm = $this->createForm('ToolsforeverBundle\Form\FabriekType', $fabriek);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fabriek_edit', array('id' => $fabriek->getId()));
        }

        return $this->render('@Toolsforever/fabriek/edit.html.twig', array(
            'fabriek' => $fabriek,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fabriek entity.
     *
     * @Route("/{id}", name="fabriek_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Fabriek $fabriek)
    {
        $form = $this->createDeleteForm($fabriek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fabriek);
            $em->flush($fabriek);
        }

        return $this->redirectToRoute('fabriek_index');
    }

    /**
     * Creates a form to delete a fabriek entity.
     *
     * @param Fabriek $fabriek The fabriek entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Fabriek $fabriek)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fabriek_delete', array('id' => $fabriek->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
