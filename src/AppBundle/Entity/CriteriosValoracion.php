<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Traits\ComunidadTrait;

/**
 * CriteriosValoracion
 *
 * @ORM\Table(name="criterios_valoracion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CriteriosValoracionRepository")
 */
class CriteriosValoracion
{
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
     * @var int
     *
     * @ORM\Column(name="ganado", type="integer")
     */
    private $ganado;

    /**
     * @var int
     *
     * @ORM\Column(name="empatado", type="integer")
     */
    private $empatado;

    /**
     * @var int
     *
     * @ORM\Column(name="perdido", type="integer")
     */
    private $perdido;

    /**
     * @var int
     *
     * @ORM\Column(name="golDelantero", type="integer")
     */
    private $golDelantero;

    /**
     * @var int
     *
     * @ORM\Column(name="golCentroCampista", type="integer")
     */
    private $golCentroCampista;

    /**
     * @var int
     *
     * @ORM\Column(name="golDefensa", type="integer")
     */
    private $golDefensa;

    /**
     * @var int
     *
     * @ORM\Column(name="golPortero", type="integer")
     */
    private $golPortero;

    /**
     * @var int
     *
     * @ORM\Column(name="imbatidoPortero", type="integer")
     */
    private $imbatidoPortero;

    /**
     * @var int
     *
     * @ORM\Column(name="imbatidoDefensa", type="integer")
     */
    private $imbatidoDefensa;

    /**
     * @var int
     *
     * @ORM\Column(name="numeroGolesGoleada", type="integer")
     */
    private $numeroGolesGoleada;

    /**
     * @var int
     *
     * @ORM\Column(name="goleadaDefensa", type="integer")
     */
    private $goleadaDefensa;

    /**
     * @var int
     *
     * @ORM\Column(name="goleadaPortero", type="integer")
     */
    private $goleadaPortero;

    /**
     * @var int
     *
     * @ORM\Column(name="numeroGolesGoleada2", type="integer")
     */
    private $numeroGolesGoleada2;

    /**
     * @var int
     *
     * @ORM\Column(name="goleadaDefensa2", type="integer")
     */
    private $goleadaDefensa2;

    /**
     * @var int
     *
     * @ORM\Column(name="goleadaPortero2", type="integer")
     */
    private $goleadaPortero2;

    /**
     * @var int
     *
     * @ORM\Column(name="asistencia", type="integer")
     */
    private $asistencia;


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
     * Set ganado
     *
     * @param integer $ganado
     * @return CriteriosValoracion
     */
    public function setGanado($ganado)
    {
        $this->ganado = $ganado;

        return $this;
    }

    /**
     * Get ganado
     *
     * @return integer 
     */
    public function getGanado()
    {
        return $this->ganado;
    }

    /**
     * Set empatado
     *
     * @param integer $empatado
     * @return CriteriosValoracion
     */
    public function setEmpatado($empatado)
    {
        $this->empatado = $empatado;

        return $this;
    }

    /**
     * Get empatado
     *
     * @return integer 
     */
    public function getEmpatado()
    {
        return $this->empatado;
    }

    /**
     * Set perdido
     *
     * @param integer $perdido
     * @return CriteriosValoracion
     */
    public function setPerdido($perdido)
    {
        $this->perdido = $perdido;

        return $this;
    }

    /**
     * Get perdido
     *
     * @return integer 
     */
    public function getPerdido()
    {
        return $this->perdido;
    }

    /**
     * Set golDelantero
     *
     * @param integer $golDelantero
     * @return CriteriosValoracion
     */
    public function setGolDelantero($golDelantero)
    {
        $this->golDelantero = $golDelantero;

        return $this;
    }

    /**
     * Get golDelantero
     *
     * @return integer 
     */
    public function getGolDelantero()
    {
        return $this->golDelantero;
    }

    /**
     * Set golCentroCampista
     *
     * @param integer $golCentroCampista
     * @return CriteriosValoracion
     */
    public function setGolCentroCampista($golCentroCampista)
    {
        $this->golCentroCampista = $golCentroCampista;

        return $this;
    }

    /**
     * Get golCentroCampista
     *
     * @return integer 
     */
    public function getGolCentroCampista()
    {
        return $this->golCentroCampista;
    }

    /**
     * Set golDefensa
     *
     * @param integer $golDefensa
     * @return CriteriosValoracion
     */
    public function setGolDefensa($golDefensa)
    {
        $this->golDefensa = $golDefensa;

        return $this;
    }

    /**
     * Get golDefensa
     *
     * @return integer 
     */
    public function getGolDefensa()
    {
        return $this->golDefensa;
    }

    /**
     * Set golPortero
     *
     * @param integer $golPortero
     * @return CriteriosValoracion
     */
    public function setGolPortero($golPortero)
    {
        $this->golPortero = $golPortero;

        return $this;
    }

    /**
     * Get golPortero
     *
     * @return integer 
     */
    public function getGolPortero()
    {
        return $this->golPortero;
    }

    /**
     * Set imbatidoPortero
     *
     * @param integer $imbatidoPortero
     * @return CriteriosValoracion
     */
    public function setImbatidoPortero($imbatidoPortero)
    {
        $this->imbatidoPortero = $imbatidoPortero;

        return $this;
    }

    /**
     * Get imbatidoPortero
     *
     * @return integer 
     */
    public function getImbatidoPortero()
    {
        return $this->imbatidoPortero;
    }

    /**
     * Set imbatidoDefensa
     *
     * @param integer $imbatidoDefensa
     * @return CriteriosValoracion
     */
    public function setImbatidoDefensa($imbatidoDefensa)
    {
        $this->imbatidoDefensa = $imbatidoDefensa;

        return $this;
    }

    /**
     * Get imbatidoDefensa
     *
     * @return integer 
     */
    public function getImbatidoDefensa()
    {
        return $this->imbatidoDefensa;
    }

    /**
     * Set numeroGolesGoleada
     *
     * @param integer $numeroGolesGoleada
     * @return CriteriosValoracion
     */
    public function setNumeroGolesGoleada($numeroGolesGoleada)
    {
        $this->numeroGolesGoleada = $numeroGolesGoleada;

        return $this;
    }

    /**
     * Get numeroGolesGoleada
     *
     * @return integer 
     */
    public function getNumeroGolesGoleada()
    {
        return $this->numeroGolesGoleada;
    }

    /**
     * Set goleadaDefensa
     *
     * @param integer $goleadaDefensa
     * @return CriteriosValoracion
     */
    public function setGoleadaDefensa($goleadaDefensa)
    {
        $this->goleadaDefensa = $goleadaDefensa;

        return $this;
    }

    /**
     * Get goleadaDefensa
     *
     * @return integer 
     */
    public function getGoleadaDefensa()
    {
        return $this->goleadaDefensa;
    }

    /**
     * Set goleadaPortero
     *
     * @param integer $goleadaPortero
     * @return CriteriosValoracion
     */
    public function setGoleadaPortero($goleadaPortero)
    {
        $this->goleadaPortero = $goleadaPortero;

        return $this;
    }

    /**
     * Get goleadaPortero
     *
     * @return integer 
     */
    public function getGoleadaPortero()
    {
        return $this->goleadaPortero;
    }

    /**
     * Set numeroGolesGoleada2
     *
     * @param integer $numeroGolesGoleada2
     * @return CriteriosValoracion
     */
    public function setNumeroGolesGoleada2($numeroGolesGoleada2)
    {
        $this->numeroGolesGoleada2 = $numeroGolesGoleada2;

        return $this;
    }

    /**
     * Get numeroGolesGoleada2
     *
     * @return integer 
     */
    public function getNumeroGolesGoleada2()
    {
        return $this->numeroGolesGoleada2;
    }

    /**
     * Set goleadaDefensa2
     *
     * @param integer $goleadaDefensa2
     * @return CriteriosValoracion
     */
    public function setGoleadaDefensa2($goleadaDefensa2)
    {
        $this->goleadaDefensa2 = $goleadaDefensa2;

        return $this;
    }

    /**
     * Get goleadaDefensa2
     *
     * @return integer 
     */
    public function getGoleadaDefensa2()
    {
        return $this->goleadaDefensa2;
    }

    /**
     * Set goleadaPortero2
     *
     * @param integer $goleadaPortero2
     * @return CriteriosValoracion
     */
    public function setGoleadaPortero2($goleadaPortero2)
    {
        $this->goleadaPortero2 = $goleadaPortero2;

        return $this;
    }

    /**
     * Get goleadaPortero2
     *
     * @return integer 
     */
    public function getGoleadaPortero2()
    {
        return $this->goleadaPortero2;
    }

    /**
     * Set asistencia
     *
     * @param integer $asistencia
     * @return CriteriosValoracion
     */
    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;

        return $this;
    }

    /**
     * Get asistencia
     *
     * @return integer 
     */
    public function getAsistencia()
    {
        return $this->asistencia;
    }
}
