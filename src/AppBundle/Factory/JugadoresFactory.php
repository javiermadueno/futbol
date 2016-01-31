<?php

namespace AppBundle\Factory;


use AppBundle\Entity\Equipo;
use AppBundle\Entity\Jugador;
use AppBundle\Services\ComunidadProvider;

class JugadoresFactory
{
    private $comunidadProvider;

    public function __construct(ComunidadProvider $comunidadProvider)
    {
        $this->comunidadProvider = $comunidadProvider;
    }

    public function createForEquipo(Equipo $equipo)
    {
        $i = 0;
        while ($i < Equipo::MAX_JUGADORES) {
            $jugador = new Jugador();
            $jugador
                ->setCreatedAt(new \DateTime('now'))
                ->setComunidad(
                    $this->comunidadProvider->get()
                );
            $equipo->addJugador($jugador);

            $i++;
        }

    }

}