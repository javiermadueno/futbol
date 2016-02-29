<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partido;
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
 */
class PuntuacionController extends Controller
{
    /**
     * Lists all Puntuacion entities.
     *
     * @Route("/", name="partido_puntuacion_index")
     * @ParamConverter(name="id", class="AppBundle\Entity\Partido")
     * @Method("GET")
     */
    public function indexAction(Partido $partido)
    {
        $em = $this->getDoctrine()->getManager();

        $puntuacions = $em
            ->getRepository('AppBundle:Puntuacion')
            ->findBy(['partido' => $partido]);

        return $this->render('puntuacion/index.html.twig', array(
            'puntuacions' => $puntuacions,
            'partido' => $partido,
         ));
    }

    /**
     * Creates a new Puntuacion entity.
     *
     * @Route("/new", name="partido_puntuacion_new")
     * @ParamConverter(name="id", class="AppBundle\Entity\Partido")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Partido $partido)
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
            'partido' => $partido,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Puntuacion entity.
     *
     * @Route("/{id_puntuacion}", name="partido_puntuacion_show")
     * @ParamConverter(name="id", class="AppBundle\Entity\Partido", options={"id" = "id"})
     * @ParamConverter(name="id_puntuacion", class="AppBundle\Entity\Puntuacion", options={"id" = "id_puntuacion"})
     * @Method("GET")
     */
    public function showAction(Partido $partido, Puntuacion $puntuacion)
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
     * @Route("/{id_puntuacion}/edit", name="partido_puntuacion_edit")
     * @ParamConverter(name="id", class="AppBundle\Entity\Partido", options={"id" = "id"})
     * @ParamConverter(name="id_puntuacion", class="AppBundle\Entity\Puntuacion", options={"id" = "id_puntuacion"})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Partido $partido, Puntuacion $puntuacion)
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
     * @Route("/{id_puntuacion}", name="partido_puntuacion_delete")
     * @ParamConverter(name="id", class="AppBundle\Entity\Partido", options={"id" = "id"})
     * @ParamConverter(name="id_puntuacion", class="AppBundle\Entity\Puntuacion", options={"id" = "id_puntuacion"})
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Partido $partido, Puntuacion $puntuacion)
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
