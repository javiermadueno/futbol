<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\ComunidadTrait;
use AppBundle\Entity\Traits\TimeStampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Partido
 *
 * @ORM\Table(name="partido")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartidoRepository")
 */
class Partido
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="jornada", type="string", length=255, nullable=true)
     */
    private $jornada;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $jugado = false;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ganadorRojo = false;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ganadorBlanco = false;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $empate = false;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $golesRojo = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $golesBlanco = 0;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Equipo", mappedBy="partido")
     */
    private $equipos;

    /**
     * @var Equipo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipo", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="equipo_blanco", referencedColumnName="id", onDelete="CASCADE")
     */
    private $equipoBlanco;

    /**
     * @var Equipo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipo", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="equipo_rojo", referencedColumnName="id", onDelete="CASCADE")
     */
    private $equipoRojo;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipos = new ArrayCollection();
    }

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Partido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set jornada
     *
     * @param string $jornada
     * @return Partido
     */
    public function setJornada($jornada)
    {
        $this->jornada = $jornada;

        return $this;
    }

    /**
     * Get jornada
     *
     * @return string 
     */
    public function getJornada()
    {
        return $this->jornada;
    }

    /**
     * Set jugado
     *
     * @param boolean $jugado
     * @return Partido
     */
    public function setJugado($jugado)
    {
        $this->jugado = $jugado;

        return $this;
    }

    /**
     * Get jugado
     *
     * @return boolean 
     */
    public function getJugado()
    {
        return $this->jugado;
    }

    /**
     * Set ganadorRojo
     *
     * @param boolean $ganadorRojo
     * @return Partido
     */
    public function setGanadorRojo($ganadorRojo)
    {
        $this->ganadorRojo = $ganadorRojo;

        return $this;
    }

    /**
     * Get ganadorRojo
     *
     * @return boolean 
     */
    public function getGanadorRojo()
    {
        return $this->ganadorRojo;
    }

    /**
     * Set ganadorBlanco
     *
     * @param boolean $ganadorBlanco
     * @return Partido
     */
    public function setGanadorBlanco($ganadorBlanco)
    {
        $this->ganadorBlanco = $ganadorBlanco;

        return $this;
    }

    /**
     * Get ganadorBlanco
     *
     * @return boolean 
     */
    public function getGanadorBlanco()
    {
        return $this->ganadorBlanco;
    }

    /**
     * Set empate
     *
     * @param boolean $empate
     * @return Partido
     */
    public function setEmpate($empate)
    {
        $this->empate = $empate;

        return $this;
    }

    /**
     * Get empate
     *
     * @return boolean 
     */
    public function getEmpate()
    {
        return $this->empate;
    }

    /**
     * Set golesRojo
     *
     * @param integer $golesRojo
     * @return Partido
     */
    public function setGolesRojo($golesRojo)
    {
        $this->golesRojo = $golesRojo;

        return $this;
    }

    /**
     * Get golesRojo
     *
     * @return integer 
     */
    public function getGolesRojo()
    {
        return $this->golesRojo;
    }

    /**
     * Set golesBlanco
     *
     * @param integer $golesBlanco
     * @return Partido
     */
    public function setGolesBlanco($golesBlanco)
    {
        $this->golesBlanco = $golesBlanco;

        return $this;
    }

    /**
     * Get golesBlanco
     *
     * @return integer 
     */
    public function getGolesBlanco()
    {
        return $this->golesBlanco;
    }

    /**
     * Add equipos
     *
     * @param \AppBundle\Entity\Equipo $equipos
     * @return Partido
     */
    public function addEquipo(Equipo $equipos)
    {
        $this->equipos[] = $equipos;

        return $this;
    }

    /**
     * Remove equipos
     *
     * @param \AppBundle\Entity\Equipo $equipos
     */
    public function removeEquipo(Equipo $equipos)
    {
        $this->equipos->removeElement($equipos);
    }

    /**
     * Get equipos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEquipos()
    {
        return $this->equipos;
    }

    /**
     * Set equipoBlanco
     *
     * @param \AppBundle\Entity\Equipo $equipoBlanco
     * @return Partido
     */
    public function setEquipoBlanco(Equipo $equipoBlanco = null)
    {
        $this->equipoBlanco = $equipoBlanco;

        return $this;
    }

    /**
     * Get equipoBlanco
     *
     * @return \AppBundle\Entity\Equipo 
     */
    public function getEquipoBlanco()
    {
        return $this->equipoBlanco;
    }

    /**
     * Set equipoRojo
     *
     * @param \AppBundle\Entity\Equipo $equipoRojo
     * @return Partido
     */
    public function setEquipoRojo(Equipo $equipoRojo = null)
    {
        $this->equipoRojo = $equipoRojo;

        return $this;
    }

    /**
     * Get equipoRojo
     *
     * @return \AppBundle\Entity\Equipo 
     */
    public function getEquipoRojo()
    {
        return $this->equipoRojo;
    }
}
