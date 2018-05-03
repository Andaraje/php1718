<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hilo
 *
 * @ORM\Table(name="hilo", indexes={@ORM\Index(name="fk_hilo_cliente1_idx", columns={"cliente_idcliente"})})
 * @ORM\Entity
 */
class Hilo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="text", length=65535, nullable=true)
     */
    private $mensaje;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="respuestas", type="integer", nullable=false)
     */
    private $respuestas = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="identificador", type="integer", nullable=false)
     */
    private $identificador;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_idcliente", referencedColumnName="idcliente")
     * })
     */
    private $clientecliente;



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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Hilo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return Hilo
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
     * @param \DateTime $fecha
     *
     * @return Hilo
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
     * Set respuestas
     *
     * @param integer $respuestas
     *
     * @return Hilo
     */
    public function setRespuestas($respuestas)
    {
        $this->respuestas = $respuestas;

        return $this;
    }

    /**
     * Get respuestas
     *
     * @return integer
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }

    /**
     * Set identificador
     *
     * @param integer $identificador
     *
     * @return Hilo
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;

        return $this;
    }

    /**
     * Get identificador
     *
     * @return integer
     */
    public function getIdentificador()
    {
        return $this->identificador;
    }

    /**
     * Set clientecliente
     *
     * @param \AppBundle\Entity\Cliente $clientecliente
     *
     * @return Hilo
     */
    public function setClientecliente(\AppBundle\Entity\Cliente $clientecliente = null)
    {
        $this->clientecliente = $clientecliente;

        return $this;
    }

    /**
     * Get clientecliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getClientecliente()
    {
        return $this->clientecliente;
    }
}
