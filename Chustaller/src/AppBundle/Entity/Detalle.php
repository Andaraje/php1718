<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detalle
 *
 * @ORM\Table(name="detalle", indexes={@ORM\Index(name="fk_detalle_factura1_idx", columns={"idfactura"}), @ORM\Index(name="fk_detalle_articulos1_idx", columns={"articulos_id"})})
 * @ORM\Entity
 */
class Detalle
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
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $precio;

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
     * @var \Factura
     *
     * @ORM\ManyToOne(targetEntity="Factura", cascade = {"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idfactura", referencedColumnName="idfactura")
     * })
     */
    private $idfactura;



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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Detalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Detalle
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set articulos
     *
     * @param \AppBundle\Entity\Articulos $articulos
     *
     * @return Detalle
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

    /**
     * Set idfactura
     *
     * @param \AppBundle\Entity\Factura $idfactura
     *
     * @return Detalle
     */
    public function setIdfactura(\AppBundle\Entity\Factura $idfactura = null)
    {
        $this->idfactura = $idfactura;

        return $this;
    }

    /**
     * Get idfactura
     *
     * @return \AppBundle\Entity\Factura
     */
    public function getIdfactura()
    {
        return $this->idfactura;
    }
    public function __toString(){
        return $this->idfactura;
    }
}
