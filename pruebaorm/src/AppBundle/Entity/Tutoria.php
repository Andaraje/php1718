<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tutoria
 *
 * @ORM\Table(name="tutoria", indexes={@ORM\Index(name="fk_Tutoria_Profesor1_idx", columns={"Profesor_DNI"})})
 * @ORM\Entity
 */
class Tutoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \Profesor
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Profesor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Profesor_DNI", referencedColumnName="DNI")
     * })
     */
    private $profesorDni;



    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Tutoria
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Tutoria
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set profesorDni
     *
     * @param \AppBundle\Entity\Profesor $profesorDni
     *
     * @return Tutoria
     */
    public function setProfesorDni(\AppBundle\Entity\Profesor $profesorDni)
    {
        $this->profesorDni = $profesorDni;

        return $this;
    }

    /**
     * Get profesorDni
     *
     * @return \AppBundle\Entity\Profesor
     */
    public function getProfesorDni()
    {
        return $this->profesorDni;
    }
}
