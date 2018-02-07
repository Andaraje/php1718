<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto")
 * @ORM\Entity
 */
class Proyecto
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=45, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha_entrega", type="date", nullable=false)
     */
    private $fechaEntrega;

    /**
     * @var float
     *
     * @ORM\Column(name="Nota_media", type="float", precision=10, scale=0, nullable=true)
     */
    private $notaMedia;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Estado", type="boolean", nullable=true)
     */
    private $estado = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Funcionalidades", type="string", length=200, nullable=false)
     */
    private $funcionalidades;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Item", inversedBy="proyectoNombre")
     * @ORM\JoinTable(name="proyecto_has_item",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Proyecto_Nombre", referencedColumnName="Nombre")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Item_Nombre", referencedColumnName="Nombre")
     *   }
     * )
     */
    private $itemNombre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->itemNombre = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fechaEntrega
     *
     * @param \DateTime $fechaEntrega
     *
     * @return Proyecto
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    /**
     * Get fechaEntrega
     *
     * @return \DateTime
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Set notaMedia
     *
     * @param float $notaMedia
     *
     * @return Proyecto
     */
    public function setNotaMedia($notaMedia)
    {
        $this->notaMedia = $notaMedia;

        return $this;
    }

    /**
     * Get notaMedia
     *
     * @return float
     */
    public function getNotaMedia()
    {
        return $this->notaMedia;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Proyecto
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
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Proyecto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set funcionalidades
     *
     * @param string $funcionalidades
     *
     * @return Proyecto
     */
    public function setFuncionalidades($funcionalidades)
    {
        $this->funcionalidades = $funcionalidades;

        return $this;
    }

    /**
     * Get funcionalidades
     *
     * @return string
     */
    public function getFuncionalidades()
    {
        return $this->funcionalidades;
    }

    /**
     * Add itemNombre
     *
     * @param \AppBundle\Entity\Item $itemNombre
     *
     * @return Proyecto
     */
    public function addItemNombre(\AppBundle\Entity\Item $itemNombre)
    {
        $this->itemNombre[] = $itemNombre;

        return $this;
    }

    /**
     * Remove itemNombre
     *
     * @param \AppBundle\Entity\Item $itemNombre
     */
    public function removeItemNombre(\AppBundle\Entity\Item $itemNombre)
    {
        $this->itemNombre->removeElement($itemNombre);
    }

    /**
     * Get itemNombre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItemNombre()
    {
        return $this->itemNombre;
    }
}
