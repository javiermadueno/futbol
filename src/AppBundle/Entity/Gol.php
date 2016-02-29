<?php
/**
 * Created by PhpStorm.
 * User: javi
 * Date: 29/2/16
 * Time: 19:25
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="goles")
 */
class Gol
{
    const NORMAl = 'normal';
    const PROPIA_PUERTA = 'propia_puerta';

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="tipo", type="string", nullable=false)
     */
    private $tipo;

    /**
     * @var Jugador
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Jugador", inversedBy="goles")
     * @ORM\JoinColumn(name="id_jugador", referencedColumnName="id", nullable=false)
     */
    private $jugador;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param $tipo
     *
     * @return $this
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }



    /**
     * Set jugador
     *
     * @param \AppBundle\Entity\Jugador $jugador
     * @return Gol
     */
    public function setJugador(Jugador $jugador = null)
    {
        $this->jugador = $jugador;

        return $this;
    }

    /**
     * Get jugador
     *
     * @return \AppBundle\Entity\Jugador 
     */
    public function getJugador()
    {
        return $this->jugador;
    }
}
