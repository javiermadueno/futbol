<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comunidad;
use AppBundle\Form\ComunidadType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Comunidad controller.
 *
 * @Route("/comunidad")
 * @Security("has_role('ROLE_USER')")
 */
class ComunidadController extends Controller
{

    /**
     * @Route(path="/", name="comunidad_index")
     */
    public function indexAction(Request $request)
    {
        $usuario = $this->getUser();
        $comunidades = $usuario->getComunidades();

        return $this->render('comunidad/index.html.twig', [
            'comunidads' => $comunidades
        ]);
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

            return $this->redirectToRoute('comunidad_show', ['id' => $comunidad->getId()]);
        }

        return $this->render('comunidad/new.html.twig', [
            'comunidad' => $comunidad,
            'form'      => $form->createView(),
        ]);
    }

    /**
     * Asocia un usuario con una Comunidad
     *
     * @Route(path="/{id}/join", name="comunidad_join")
     */
    public function joinAction(Request $request, Comunidad $comunidad)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->getUser();

        //Crear un formulario para enviar por Post los datos

        $comunidad->addUsuario($usuario);

        $em->persist($comunidad);
        $em->flush();

        return $this->redirectToRoute('comunidad_show', [
            'id' => $comunidad->getId()
        ]);

    }


    /**
     * Guarda en session la comunidad seleccionada por el usuario
     *
     * @Route(path="/{id}/select", name="comunidad_select")
     */
    public function selectAction(Request $request, Comunidad $comunidad)
    {
        $usuario = $this->getUser();

        if ($usuario->getComunidades()->contains($comunidad)) {
            $this->get('app.comunidad.provider')->set($comunidad);
        }

        if($request->attributes->has('return_url')){
            return new RedirectResponse($request->attributes->get('return_url'), Response::HTTP_FOUND);
        }

        return $this->redirectToRoute('comunidad_index');
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

        $this->get('app.comunidad.provider')->set($comunidad);

        return $this->render('comunidad/show.html.twig', [
            'comunidad'   => $comunidad,
            'delete_form' => $deleteForm->createView(),
        ]);
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

            return $this->redirectToRoute('comunidad_edit', ['id' => $comunidad->getId()]);
        }

        return $this->render('comunidad/edit.html.twig', [
            'comunidad'   => $comunidad,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
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
            ->setAction($this->generateUrl('comunidad_delete', ['id' => $comunidad->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
