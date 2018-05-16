<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Valoracion
 *
 * @ORM\Table(name="valoracion", indexes={@ORM\Index(name="fk_valoracion_articulos1_idx", columns={"articulos_id"})})
 * @ORM\Entity
 */
class Valoracion
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
     * @ORM\Column(name="comentario", type="string", length=1000, nullable=false)
     */
    private $comentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntuacion", type="integer", nullable=false)
     */
    private $puntuacion = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255, nullable=true)
     */
    private $user = 'anon';

    /**
     * @var \Articulos
     *
     * @ORM\ManyToOne(targetEntity="Articulos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="articulos_id", referencedColumnName="id")
     * })
     */
    private $articulos;



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
     * Set comentario
     *
     * @param string $comentario
     *
     * @return Valoracion
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set puntuacion
     *
     * @param integer $puntuacion
     *
     * @return Valoracion
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * Get puntuacion
     *
     * @return integer
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Valoracion
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set articulos
     *
     * @param \AppBundle\Entity\Articulos $articulos
     *
     * @return Valoracion
     */
    public function setArticulos(\AppBundle\Entity\Articulos $articulos = null)
    {
        $this->articulos = $articulos;

        return $this;
    }

    /**
     * Get articulos
     *
     * @return \AppBundle\Entity\Articulos
     */
    public function getArticulos()
    {
        return $this->articulos;
    }
}
