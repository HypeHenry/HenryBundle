<?php

namespace ToolsforeverBundle\Controller;

use ToolsforeverBundle\Entity\Artikel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use ToolsforeverBundle\Form\ProductType;

/**
 * Artikel controller.
 *
 * @Route("artikel")
 */
class ArtikelController extends Controller
{
    /**
     * Lists all artikel entities.
     *
     * @Route("/", name="artikel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artikels = $em->getRepository('ToolsforeverBundle:Artikel')->findAll();

        return $this->render('@Toolsforever/artikel/index.html.twig', array(
            'artikels' => $artikels,
        ));
    }

    /**
     * Creates a new artikel entity.
     *
     * @Route("/new", name="artikel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $artikel = new Artikel();
        $form = $this->createForm('ToolsforeverBundle\Form\ArtikelType', $artikel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $artikel->getBrochure();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $artikel->setBrochure($fileName);

            // ... persist the $product variable or any other work

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artikel);
            $em->flush($artikel);

            return $this->redirectToRoute('artikel_show', array('id' => $artikel->getId()));
        }}

        return $this->render('@Toolsforever/artikel/new.html.twig', array(
            'artikel' => $artikel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a artikel entity.
     *
     * @Route("/{id}", name="artikel_show")
     * @Method("GET")
     */
    public function showAction(Artikel $artikel)
    {
        $deleteForm = $this->createDeleteForm($artikel);

        return $this->render('@Toolsforever/artikel/show.html.twig', array(
            'artikel' => $artikel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artikel entity.
     *
     * @Route("/{id}/edit", name="artikel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Artikel $artikel)
    {
        $deleteForm = $this->createDeleteForm($artikel);
        $editForm = $this->createForm('ToolsforeverBundle\Form\ArtikelType', $artikel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $artikel->getBrochure();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $artikel->setBrochure($fileName);

            // ... persist the $product variable or any other work

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artikel_edit', array('id' => $artikel->getId()));
        }}

        return $this->render('@Toolsforever/artikel/edit.html.twig', array(
            'artikel' => $artikel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a artikel entity.
     *
     * @Route("/{id}", name="artikel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Artikel $artikel)
    {
        $form = $this->createDeleteForm($artikel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artikel);
            $em->flush($artikel);
        }

        return $this->redirectToRoute('artikel_index');
    }

    /**
     * Creates a form to delete a artikel entity.
     *
     * @param Artikel $artikel The artikel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Artikel $artikel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artikel_delete', array('id' => $artikel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
