<?php

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Comunidad;
use Doctrine\ORM\Mapping as ORM;


trait ComunidadTrait
{

    /**
     * @var Comunidad
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comunidad")
     * @ORM\JoinColumn(name="id_comunidad", referencedColumnName="id")
     */
    private $comunidad;

    /**
     * @return Comunidad
     */
    public function getComunidad()
    {
        return $this->comunidad;
    }

    /**
     * @param Comunidad $comunidad
     *
     * @return $this
     */
    public function setComunidad(Comunidad $comunidad)
    {
        $this->comunidad = $comunidad;
        return $this;
    }


}