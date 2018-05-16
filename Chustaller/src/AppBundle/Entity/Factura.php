<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factura
 *
 * @ORM\Table(name="factura", indexes={@ORM\Index(name="fk_factura_cliente1_idx", columns={"cliente_idcliente"})})
 * @ORM\Entity
 */
class Factura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idfactura", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfactura;

    /**
     * @var float
     *
     * @ORM\Column(name="preciofac", type="float", precision=10, scale=0, nullable=false)
     */
    private $preciofac;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pagado", type="boolean", nullable=true)
     */
    private $pagado = '0';

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
     * Get idfactura
     *
     * @return integer
     */
    public function getIdfactura()
    {
        return $this->idfactura;
    }

    /**
     * Set preciofac
     *
     * @param float $preciofac
     *
     * @return Factura
     */
    public function setPreciofac($preciofac)
    {
        $this->preciofac = $preciofac;

        return $this;
    }

    /**
     * Get preciofac
     *
     * @return float
     */
    public function getPreciofac()
    {
        return $this->preciofac;
    }

    /**
     * Set pagado
     *
     * @param boolean $pagado
     *
     * @return Factura
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }

    /**
     * Get pagado
     *
     * @return boolean
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set clientecliente
     *
     * @param \AppBundle\Entity\Cliente $clientecliente
     *
     * @return Factura
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
