<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
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
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=45, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="Peso", type="integer", nullable=false)
     */
    private $peso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Estado", type="boolean", nullable=false)
     */
    private $estado = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyecto", mappedBy="itemNombre")
     */
    private $proyectoNombre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyectoNombre = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Item
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
     * Set peso
     *
     * @param integer $peso
     *
     * @return Item
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return integer
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Item
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
     * Add proyectoNombre
     *
     * @param \AppBundle\Entity\Proyecto $proyectoNombre
     *
     * @return Item
     */
    public function addProyectoNombre(\AppBundle\Entity\Proyecto $proyectoNombre)
    {
        $this->proyectoNombre[] = $proyectoNombre;

        return $this;
    }

    /**
     * Remove proyectoNombre
     *
     * @param \AppBundle\Entity\Proyecto $proyectoNombre
     */
    public function removeProyectoNombre(\AppBundle\Entity\Proyecto $proyectoNombre)
    {
        $this->proyectoNombre->removeElement($proyectoNombre);
    }

    /**
     * Get proyectoNombre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProyectoNombre()
    {
        return $this->proyectoNombre;
    }
}
