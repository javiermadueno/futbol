<?php

namespace AppBundle\Services;


use AppBundle\Entity\Comunidad;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ComunidadProvider
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function get()
    {
        if($this->session->has('comunidad')) {
            return $comunidad = $this->session->get('comunidad');
        }

        return null;
    }

    public function set(Comunidad $comunidad)
    {
        $this->session->set('comunidad', $comunidad);
    }

}