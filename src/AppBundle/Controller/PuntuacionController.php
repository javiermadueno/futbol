<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Puntuacion;
use AppBundle\Form\PuntuacionType;

/**
 * Puntuacion controller.
 *
 * @Route("/partido/{id}/puntuacion")
 * @ParamConverter(name="id", class="AppBundle/Entity/Partido")
 */
class PuntuacionController extends Controller
{
    /**
     * Lists all Puntuacion entities.
     *
     * @Route("/", name="partido_puntuacion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $puntuacions = $em->getRepository('AppBundle:Puntuacion')->findAll();

        return $this->render('puntuacion/index.html.twig', array(
            'puntuacions' => $puntuacions,
        ));
    }

    /**
     * Creates a new Puntuacion entity.
     *
     * @Route("/new", name="partido_puntuacion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $puntuacion = new Puntuacion();
        $form = $this->createForm('AppBundle\Form\PuntuacionType', $puntuacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($puntuacion);
            $em->flush();

            return $this->redirectToRoute('partido_puntuacion_show', array('id' => $puntuacion->getId()));
        }

        return $this->render('puntuacion/new.html.twig', array(
            'puntuacion' => $puntuacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Puntuacion entity.
     *
     * @Route("/{id}", name="partido_puntuacion_show")
     * @Method("GET")
     */
    public function showAction(Puntuacion $puntuacion)
    {
        $deleteForm = $this->createDeleteForm($puntuacion);

        return $this->render('puntuacion/show.html.twig', array(
            'puntuacion' => $puntuacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Puntuacion entity.
     *
     * @Route("/{id}/edit", name="partido_puntuacion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Puntuacion $puntuacion)
    {
        $deleteForm = $this->createDeleteForm($puntuacion);
        $editForm = $this->createForm('AppBundle\Form\PuntuacionType', $puntuacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($puntuacion);
            $em->flush();

            return $this->redirectToRoute('partido_puntuacion_edit', array('id' => $puntuacion->getId()));
        }

        return $this->render('puntuacion/edit.html.twig', array(
            'puntuacion' => $puntuacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Puntuacion entity.
     *
     * @Route("/{id}", name="partido_puntuacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Puntuacion $puntuacion)
    {
        $form = $this->createDeleteForm($puntuacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($puntuacion);
            $em->flush();
        }

        return $this->redirectToRoute('partido_puntuacion_index');
    }

    /**
     * Creates a form to delete a Puntuacion entity.
     *
     * @param Puntuacion $puntuacion The Puntuacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Puntuacion $puntuacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partido_puntuacion_delete', array('id' => $puntuacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
