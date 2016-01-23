<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\ComunidadTrait;
use AppBundle\Entity\Traits\TimeStampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Puntuacion
 *
 * @ORM\Table(name="puntuacion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PuntuacionRepository")
 */
class Puntuacion
{
    use ComunidadTrait;
    use TimeStampableTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", nullable=false)
     */
    private $usuario;

    /**
     * @var Partido
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Partido")
     * @ORM\JoinColumn(name="id_partido", referencedColumnName="id", nullable=false)
     */
    private $partido;

    /**
     * @var int
     *
     * @ORM\Column(name="goles", type="integer", nullable=true)
     */
    private $goles;

    /**
     * @var bool
     *
     * @ORM\Column(name="partidoGanado", type="boolean", nullable=true)
     */
    private $partidoGanado;

    /**
     * @var bool
     *
     * @ORM\Column(name="partidoPerdido", type="boolean", nullable=true)
     */
    private $partidoPerdido;

    /**
     * @var bool
     *
     * @ORM\Column(name="partidoEmpatado", type="boolean", nullable=true)
     */
    private $partidoEmpatado;

    /**
     * @var int
     *
     * @ORM\Column(name="valoracion", type="integer", nullable=true)
     */
    private $valoracion;



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
     * Set goles
     *
     * @param integer $goles
     * @return Puntuacion
     */
    public function setGoles($goles)
    {
        $this->goles = $goles;

        return $this;
    }

    /**
     * Get goles
     *
     * @return integer 
     */
    public function getGoles()
    {
        return $this->goles;
    }

    /**
     * Set partidoGanado
     *
     * @param boolean $partidoGanado
     * @return Puntuacion
     */
    public function setPartidoGanado($partidoGanado)
    {
        $this->partidoGanado = $partidoGanado;

        return $this;
    }

    /**
     * Get partidoGanado
     *
     * @return boolean 
     */
    public function getPartidoGanado()
    {
        return $this->partidoGanado;
    }

    /**
     * Set partidoPerdido
     *
     * @param boolean $partidoPerdido
     * @return Puntuacion
     */
    public function setPartidoPerdido($partidoPerdido)
    {
        $this->partidoPerdido = $partidoPerdido;

        return $this;
    }

    /**
     * Get partidoPerdido
     *
     * @return boolean 
     */
    public function getPartidoPerdido()
    {
        return $this->partidoPerdido;
    }

    /**
     * Set partidoEmpatado
     *
     * @param boolean $partidoEmpatado
     * @return Puntuacion
     */
    public function setPartidoEmpatado($partidoEmpatado)
    {
        $this->partidoEmpatado = $partidoEmpatado;

        return $this;
    }

    /**
     * Get partidoEmpatado
     *
     * @return boolean 
     */
    public function getPartidoEmpatado()
    {
        return $this->partidoEmpatado;
    }

    /**
     * Set valoracion
     *
     * @param integer $valoracion
     * @return Puntuacion
     */
    public function setValoracion($valoracion)
    {
        $this->valoracion = $valoracion;

        return $this;
    }

    /**
     * Get valoracion
     *
     * @return integer 
     */
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     * @return Puntuacion
     */
    public function setUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set partido
     *
     * @param Partido $partido
     * @return Puntuacion
     */
    public function setPartido(Partido $partido)
    {
        $this->partido = $partido;

        return $this;
    }

    /**
     * Get partido
     *
     * @return Partido
     */
    public function getPartido()
    {
        return $this->partido;
    }
}
