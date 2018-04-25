<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincias
 *
 * @ORM\Table(name="provincias", uniqueConstraints={@ORM\UniqueConstraint(name="IDX_provincia", columns={"provincia"})}, indexes={@ORM\Index(name="fk_provincias_comunidades1_idx", columns={"comunidades_id"})})
 * @ORM\Entity
 */
class Provincias
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
     * @ORM\Column(name="slug", type="string", length=50, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=255, nullable=false)
     */
    private $provincia;

    /**
     * @var integer
     *
     * @ORM\Column(name="capital_id", type="integer", nullable=false)
     */
    private $capitalId = '-1';

    /**
     * @var integer
     *
     * @ORM\Column(name="comunidades_id", type="integer", nullable=false)
     */
    private $comunidadesId;



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
     * Set slug
     *
     * @param string $slug
     *
     * @return Provincias
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
     * Set provincia
     *
     * @param string $provincia
     *
     * @return Provincias
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set capitalId
     *
     * @param integer $capitalId
     *
     * @return Provincias
     */
    public function setCapitalId($capitalId)
    {
        $this->capitalId = $capitalId;

        return $this;
    }

    /**
     * Get capitalId
     *
     * @return integer
     */
    public function getCapitalId()
    {
        return $this->capitalId;
    }

    /**
     * Set comunidadesId
     *
     * @param integer $comunidadesId
     *
     * @return Provincias
     */
    public function setComunidadesId($comunidadesId)
    {
        $this->comunidadesId = $comunidadesId;

        return $this;
    }

    /**
     * Get comunidadesId
     *
     * @return integer
     */
    public function getComunidadesId()
    {
        return $this->comunidadesId;
    }
}
