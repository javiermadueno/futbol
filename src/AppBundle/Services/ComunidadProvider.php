<?php

namespace AppBundle\Services;


use AppBundle\Entity\Comunidad;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ComunidadProvider
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var Comunidad
     */
    private $comunidad;

    public function __construct(SessionInterface $session, EntityManager $em)
    {
        $this->session = $session;
        $this->em = $em;
    }

    /**
     * @return Comunidad|mixed|null|object
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function get()
    {
        if($this->comunidad instanceof Comunidad) {
            return $this->comunidad;
        }

        if($this->session->has('comunidad')) {
            $comunidad = $this->session->get('comunidad');
            $this->comunidad = $this->em->merge($comunidad);
            return $this->comunidad;
        }

        return null;
    }

    public function set(Comunidad $comunidad)
    {
        $this->comunidad = $comunidad;
        $this->session->set('comunidad', $comunidad);
    }

}