<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comunidades
 *
 * @ORM\Table(name="comunidades", uniqueConstraints={@ORM\UniqueConstraint(name="IDX_cominidad", columns={"comunidad"}), @ORM\UniqueConstraint(name="slug", columns={"slug"})})
 * @ORM\Entity
 */
class Comunidades
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
     * @ORM\Column(name="comunidad", type="string", length=255, nullable=false)
     */
    private $comunidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="capital_id", type="integer", nullable=false)
     */
    private $capitalId;



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
     * @return Comunidades
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
     * Set comunidad
     *
     * @param string $comunidad
     *
     * @return Comunidades
     */
    public function setComunidad($comunidad)
    {
        $this->comunidad = $comunidad;

        return $this;
    }

    /**
     * Get comunidad
     *
     * @return string
     */
    public function getComunidad()
    {
        return $this->comunidad;
    }

    /**
     * Set capitalId
     *
     * @param integer $capitalId
     *
     * @return Comunidades
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
}
