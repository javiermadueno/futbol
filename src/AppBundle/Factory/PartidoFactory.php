<?php


namespace AppBundle\Factory;


use AppBundle\Entity\Partido;
use AppBundle\Services\ComunidadProvider;

class PartidoFactory
{

    private $equipoFactory;

    private $comunidadProvider;

    public function __construct(EquipoFactory $equipoFactory, ComunidadProvider $comunidadProvider)
    {
        $this->equipoFactory = $equipoFactory;
        $this->comunidadProvider = $comunidadProvider;
    }

    public function create()
    {
        $partido = new Partido();

        $partido
            ->setCreatedAt(new \DateTime('now'))
            ->setComunidad(
                $this
                    ->comunidadProvider
                    ->get()
            )
            ->setEquipoBlanco(
                $this
                    ->equipoFactory
                    ->createEquipoBlancoFor($partido)
            )
            ->setEquipoRojo(
                $this
                    ->equipoFactory
                    ->createEquipoRojoFor($partido)
            )
            ->setJugado(false)
        ;

        return $partido;
    }
}