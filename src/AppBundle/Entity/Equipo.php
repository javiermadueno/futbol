<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\ActiveTrait;
use AppBundle\Entity\Traits\ComunidadTrait;
use AppBundle\Entity\Traits\TimeStampableTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipoRepository")
 */
class Equipo
{
    /**
     * Numero maximo de jugadores por equipo
     */
    const MAX_JUGADORES = 7;

    use ActiveTrait;
    use TimeStampableTrait;
    use ComunidadTrait;

    const BLANCO = 'equipo_blanco';
    const ROJO   = 'equipo_rojo';

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
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


    /**
     * @var Partido
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Partido", inversedBy="equipos")
     * @ORM\JoinColumn(name="id_partido", referencedColumnName="id", onDelete="CASCADE")
     */
    private $partido;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Jugador", mappedBy="equipo", cascade={"persist"})
     */
    private $jugadores;


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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Equipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Equipo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set partido
     *
     * @param string $partido
     *
     * @return Equipo
     */
    public function setPartido($partido)
    {
        $this->partido = $partido;

        return $this;
    }

    /**
     * Get partido
     *
     * @return string
     */
    public function getPartido()
    {
        return $this->partido;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugadores = new ArrayCollection();
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add jugadores
     *
     * @param Jugador $jugador
     *
     * @return Equipo
     */
    public function addJugador(Jugador $jugador)
    {
        $jugador->setEquipo($this);

        $this->jugadores[] = $jugador;

        return $this;
    }

    /**
     * Remove jugadores
     *
     * @param \AppBundle\Entity\Jugador $jugador
     */
    public function removeJugador(Jugador $jugador)
    {
        $this->jugadores->removeElement($jugador);
    }

    /**
     * Get jugadores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJugadores()
    {
        return $this->jugadores;
    }


}
