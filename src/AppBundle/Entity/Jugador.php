<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\ComunidadTrait;
use AppBundle\Entity\Traits\TimeStampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador", uniqueConstraints={@ORM\UniqueConstraint(name="jugador", columns={"id_partido", "id_usuario"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JugadorRepository")
 */
class Jugador
{
    use TimeStampableTrait;
    use ComunidadTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Posicion")
     * @ORM\JoinColumn(name="id_posicion", referencedColumnName="id")
     */
    private $posicion;

    /**
     * @var Equipo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipo", inversedBy="jugadores")
     * @ORM\JoinColumn(name="id_equipo", referencedColumnName="id", onDelete="CASCADE")
     */
    private $equipo;

    /**
     * @var Partido
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Partido")
     * @ORM\JoinColumn(name="id_partido", referencedColumnName="id", onDelete="CASCADE")
     */
    private $partido;

    /**
     * @var int
     *
     * @ORM\Column(name="goles", type="integer", nullable=true)
     */
    private $goles;

    /**
     * @var int
     *
     * @ORM\Column(name="asistencias", type="integer", nullable=true)
     */
    private $asistencias;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Jugador
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set posicion
     *
     * @param string $posicion
     * @return Jugador
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return string 
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * @return Equipo
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * @param Equipo $equipo
     */
    public function setEquipo(Equipo $equipo)
    {
        $this->equipo = $equipo;

        if($equipo->getPartido() instanceof Partido) {
            $this->setPartido($equipo->getPartido());
        }
    }

    /**
     * @return Partido
     */
    public function getPartido()
    {
        return $this->partido;
    }

    /**
     * @param $partido
     *
     * @return $this
     */
    public function setPartido($partido)
    {
        $this->partido = $partido;
        return $this;
    }

    /**
     * @return int
     */
    public function getGoles()
    {
        return $this->goles;
    }

    /**
     * @param int $goles
     */
    public function setGoles($goles)
    {
        $this->goles = $goles;
    }

    /**
     * @return int
     */
    public function getAsistencias()
    {
        return $this->asistencias;
    }

    /**
     * @param int $asistencias
     */
    public function setAsistencias($asistencias)
    {
        $this->asistencias = $asistencias;
    }


}
