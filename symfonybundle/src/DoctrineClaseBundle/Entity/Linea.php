<?php

namespace DoctrineClaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Linea
 *
 * @ORM\Table(name="linea")
 * @ORM\Entity
 */
class Linea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idlinea", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlinea;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=50, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=128, nullable=false)
     */
    private $mensaje;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha", type="string", length=45, nullable=false)
     */
    private $fecha;



    /**
     * Get idlinea
     *
     * @return integer
     */
    public function getIdlinea()
    {
        return $this->idlinea;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Linea
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
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return Linea
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set fecha
     *
     * @param string $fecha
     *
     * @return Linea
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
