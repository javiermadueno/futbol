<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posicion
 *
 * @ORM\Table(name="posicion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PosicionRepository")
 */
class Posicion
{
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;



    /**
     * @var string
     *
     * @ORM\Column(name="siglas", type="string", length=3)
     */
    private $siglas;

    /**
     * @var int
     *
     * @ORM\Column(name="prioridad", type="integer", unique=true)
     */
    private $prioridad;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Posicion
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
     * @return string
     */
    public function getSiglas()
    {
        return $this->siglas;
    }

    /**
     * @param $siglas
     *
     * @return $this
     */
    public function setSiglas($siglas)
    {
        $this->siglas = $siglas;
        return $this;
    }

    /**
     * Set prioridad
     *
     * @param integer $prioridad
     * @return Posicion
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    /**
     * Get prioridad
     *
     * @return integer 
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }
}
