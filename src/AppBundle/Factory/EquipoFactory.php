<?php

namespace AppBundle\Factory;


use AppBundle\Entity\Equipo;
use AppBundle\Entity\Partido;
use AppBundle\Services\ComunidadProvider;

class EquipoFactory
{
    private $comunidadProvider;

    public function __construct(ComunidadProvider $comunidadProvider)
    {
        $this->comunidadProvider = $comunidadProvider;
    }

    /**
     * @param Partido $partido
     *
     * @return Equipo
     */
    public function createForPartido(Partido $partido)
    {
        $equipo = new Equipo();

        $equipo
            ->setCreatedAt(new \DateTime('now'))
            ->setIsActive(true)
            ->setComunidad(
                $this
                    ->comunidadProvider
                    ->get()
            )
            ->setPartido($partido)
        ;

        return $equipo;
    }

    /**
     * @param Partido $partido
     *
     * @return Equipo
     */
    public function createEquipoBlancoFor(Partido $partido)
    {
        $equipo = $this
            ->createForPartido($partido)
            ->setNombre(Equipo::BLANCO);

        return $equipo;
    }

    /**
     * @param Partido $partido
     *
     * @return Equipo
     */
    public function createEquipoRojoFor(Partido $partido)
    {
        $equipo = $this
            ->createForPartido($partido)
            ->setNombre(Equipo::ROJO);

        return $equipo;
    }
}