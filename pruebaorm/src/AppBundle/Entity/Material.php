<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material", indexes={@ORM\Index(name="fk_Material_Proyecto1_idx", columns={"Proyecto_Nombre"})})
 * @ORM\Entity
 */
class Material
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMaterial", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idmaterial;

    /**
     * @var string
     *
     * @ORM\Column(name="Archivo", type="blob", length=65535, nullable=false)
     */
    private $archivo;

    /**
     * @var \Proyecto
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Proyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Proyecto_Nombre", referencedColumnName="Nombre")
     * })
     */
    private $proyectoNombre;



    /**
     * Set idmaterial
     *
     * @param integer $idmaterial
     *
     * @return Material
     */
    public function setIdmaterial($idmaterial)
    {
        $this->idmaterial = $idmaterial;

        return $this;
    }

    /**
     * Get idmaterial
     *
     * @return integer
     */
    public function getIdmaterial()
    {
        return $this->idmaterial;
    }

    /**
     * Set archivo
     *
     * @param string $archivo
     *
     * @return Material
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;

        return $this;
    }

    /**
     * Get archivo
     *
     * @return string
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * Set proyectoNombre
     *
     * @param \AppBundle\Entity\Proyecto $proyectoNombre
     *
     * @return Material
     */
    public function setProyectoNombre(\AppBundle\Entity\Proyecto $proyectoNombre)
    {
        $this->proyectoNombre = $proyectoNombre;

        return $this;
    }

    /**
     * Get proyectoNombre
     *
     * @return \AppBundle\Entity\Proyecto
     */
    public function getProyectoNombre()
    {
        return $this->proyectoNombre;
    }
}
