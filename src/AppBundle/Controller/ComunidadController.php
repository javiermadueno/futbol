<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Comunidad;
use AppBundle\Form\ComunidadType;

/**
 * Comunidad controller.
 *
 * @Route("/comunidad")
 * @Security("has_role('ROLE_USER')")
 */
class ComunidadController extends Controller
{
    /**
     * Lists all Comunidad entities.
     *
     * @Route("/", name="comunidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comunidads = $this->getUser()->getComunidades()->toArray();

        return $this->render('comunidad/index.html.twig', array(
            'comunidads' => $comunidads,
        ));
    }

    /**
     * Creates a new Comunidad entity.
     *
     * @Route("/new", name="comunidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comunidad = new Comunidad();
        $form = $this->createForm('AppBundle\Form\ComunidadType', $comunidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comunidad->addUsuario($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($comunidad);
            $em->flush();

            return $this->redirectToRoute('comunidad_show', array('id' => $comunidad->getId()));
        }

        return $this->render('comunidad/new.html.twig', array(
            'comunidad' => $comunidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comunidad entity.
     *
     * @Route("/{id}", name="comunidad_show")
     * @Method("GET")
     */
    public function showAction(Comunidad $comunidad)
    {
        $deleteForm = $this->createDeleteForm($comunidad);

        return $this->render('comunidad/show.html.twig', array(
            'comunidad' => $comunidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comunidad entity.
     *
     * @Route("/{id}/edit", name="comunidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comunidad $comunidad)
    {
        $deleteForm = $this->createDeleteForm($comunidad);
        $editForm = $this->createForm('AppBundle\Form\ComunidadType', $comunidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comunidad);
            $em->flush();

            return $this->redirectToRoute('comunidad_edit', array('id' => $comunidad->getId()));
        }

        return $this->render('comunidad/edit.html.twig', array(
            'comunidad' => $comunidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Comunidad entity.
     *
     * @Route("/{id}", name="comunidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comunidad $comunidad)
    {
        $form = $this->createDeleteForm($comunidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comunidad);
            $em->flush();
        }

        return $this->redirectToRoute('comunidad_index');
    }

    /**
     * Creates a form to delete a Comunidad entity.
     *
     * @param Comunidad $comunidad The Comunidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comunidad $comunidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comunidad_delete', array('id' => $comunidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
