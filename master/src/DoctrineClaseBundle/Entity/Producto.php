<?php

namespace DoctrineClaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProducto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproducto;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=250, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="Imagen", type="blob", nullable=true)
     */
    private $imagen;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jugador", mappedBy="productoproducto")
     */
    private $jugadorEmail;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugadorEmail = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idproducto
     *
     * @return integer
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Producto
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Add jugadorEmail
     *
     * @param \DoctrineClaseBundle\Entity\Jugador $jugadorEmail
     *
     * @return Producto
     */
    public function addJugadorEmail(\DoctrineClaseBundle\Entity\Jugador $jugadorEmail)
    {
        $this->jugadorEmail[] = $jugadorEmail;

        return $this;
    }

    /**
     * Remove jugadorEmail
     *
     * @param \DoctrineClaseBundle\Entity\Jugador $jugadorEmail
     */
    public function removeJugadorEmail(\DoctrineClaseBundle\Entity\Jugador $jugadorEmail)
    {
        $this->jugadorEmail->removeElement($jugadorEmail);
    }

    /**
     * Get jugadorEmail
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJugadorEmail()
    {
        return $this->jugadorEmail;
    }
}
