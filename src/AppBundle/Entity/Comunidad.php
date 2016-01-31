<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comunidad
 *
 * @ORM\Table(name="comunidad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComunidadRepository")
 */
class Comunidad
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var bool
     *
     * @ORM\Column(name="privada", type="boolean")
     */
    private $privada;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Usuario", inversedBy="comunidades")
     */
    private $usuarios;


    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Comunidad
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
     * Set Privada
     *
     * @param boolean $privada
     * @return Comunidad
     */
    public function setPrivada($privada)
    {
        $this->privada = $privada;

        return $this;
    }

    /**
     * Get Privada
     *
     * @return boolean 
     */
    public function isPrivada()
    {
        return $this->privada;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Comunidad
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }



    /**
     * Get privada
     *
     * @return boolean 
     */
    public function getPrivada()
    {
        return $this->privada;
    }

    /**
     * Add usuarios
     *
     * @param Usuario $usuarios
     * @return Comunidad
     */
    public function addUsuario(Usuario $usuarios)
    {
        $this->usuarios[] = $usuarios;
        $usuarios->addComunidad($this);

        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \AppBundle\Entity\Usuario $usuarios
     */
    public function removeUsuario(\AppBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}
