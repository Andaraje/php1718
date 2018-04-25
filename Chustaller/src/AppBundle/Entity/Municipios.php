<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipios
 *
 * @ORM\Table(name="municipios", uniqueConstraints={@ORM\UniqueConstraint(name="IDX_municipio", columns={"municipio"}), @ORM\UniqueConstraint(name="slug", columns={"slug"})}, indexes={@ORM\Index(name="fk_municipios_provincias1_idx", columns={"provincias_id"})})
 * @ORM\Entity
 */
class Municipios
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
     * @ORM\Column(name="municipio", type="string", length=255, nullable=false)
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var float
     *
     * @ORM\Column(name="latitud", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitud;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitud;

    /**
     * @var integer
     *
     * @ORM\Column(name="provincias_id", type="integer", nullable=false)
     */
    private $provinciasId;



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
     * Set municipio
     *
     * @param string $municipio
     *
     * @return Municipios
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Municipios
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     *
     * @return Municipios
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     *
     * @return Municipios
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set provinciasId
     *
     * @param integer $provinciasId
     *
     * @return Municipios
     */
    public function setProvinciasId($provinciasId)
    {
        $this->provinciasId = $provinciasId;

        return $this;
    }

    /**
     * Get provinciasId
     *
     * @return integer
     */
    public function getProvinciasId()
    {
        return $this->provinciasId;
    }
}
