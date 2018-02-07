<?php

namespace DoctrineClaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partida
 *
 * @ORM\Table(name="partida", indexes={@ORM\Index(name="fk_partida_jugador_idx", columns={"jugador_email"})})
 * @ORM\Entity
 */
class Partida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPartida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpartida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="Puntos", type="integer", nullable=false)
     */
    private $puntos;

    /**
     * @var \Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jugador_email", referencedColumnName="email")
     * })
     */
    private $jugadorEmail;



    /**
     * Get idpartida
     *
     * @return integer
     */
    public function getIdpartida()
    {
        return $this->idpartida;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Partida
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
     * Set puntos
     *
     * @param integer $puntos
     *
     * @return Partida
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get puntos
     *
     * @return integer
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set jugadorEmail
     *
     * @param \DoctrineClaseBundle\Entity\Jugador $jugadorEmail
     *
     * @return Partida
     */
    public function setJugadorEmail(\DoctrineClaseBundle\Entity\Jugador $jugadorEmail = null)
    {
        $this->jugadorEmail = $jugadorEmail;

        return $this;
    }

    /**
     * Get jugadorEmail
     *
     * @return \DoctrineClaseBundle\Entity\Jugador
     */
    public function getJugadorEmail()
    {
        return $this->jugadorEmail;
    }
}
