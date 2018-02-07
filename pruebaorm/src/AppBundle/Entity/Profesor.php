<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesor
 *
 * @ORM\Table(name="profesor", uniqueConstraints={@ORM\UniqueConstraint(name="DNI_UNIQUE", columns={"DNI"})})
 * @ORM\Entity
 */
class Profesor
{
    /**
     * @var string
     *
     * @ORM\Column(name="DNI", type="string", length=9, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellido1", type="string", length=45, nullable=false)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellido2", type="string", length=45, nullable=false)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="Correo", type="string", length=45, nullable=false)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="Contrasenya", type="string", length=45, nullable=false)
     */
    private $contrasenya;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Alumno", mappedBy="profesorDni")
     */
    private $alumnoDni;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnoDni = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Profesor
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
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
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return Profesor
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return Profesor
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Profesor
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set contrasenya
     *
     * @param string $contrasenya
     *
     * @return Profesor
     */
    public function setContrasenya($contrasenya)
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }

    /**
     * Get contrasenya
     *
     * @return string
     */
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * Add alumnoDni
     *
     * @param \AppBundle\Entity\Alumno $alumnoDni
     *
     * @return Profesor
     */
    public function addAlumnoDni(\AppBundle\Entity\Alumno $alumnoDni)
    {
        $this->alumnoDni[] = $alumnoDni;

        return $this;
    }

    /**
     * Remove alumnoDni
     *
     * @param \AppBundle\Entity\Alumno $alumnoDni
     */
    public function removeAlumnoDni(\AppBundle\Entity\Alumno $alumnoDni)
    {
        $this->alumnoDni->removeElement($alumnoDni);
    }

    /**
     * Get alumnoDni
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnoDni()
    {
        return $this->alumnoDni;
    }
}
