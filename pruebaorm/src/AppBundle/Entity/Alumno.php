<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno", uniqueConstraints={@ORM\UniqueConstraint(name="DNI_UNIQUE", columns={"DNI"})})
 * @ORM\Entity
 */
class Alumno
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
     * @ORM\ManyToMany(targetEntity="Profesor", inversedBy="alumnoDni")
     * @ORM\JoinTable(name="alumno_has_profesor",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Alumno_DNI", referencedColumnName="DNI")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Profesor_DNI", referencedColumnName="DNI")
     *   }
     * )
     */
    private $profesorDni;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->profesorDni = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Alumno
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
     * @return Alumno
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
     * @return Alumno
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
     * @return Alumno
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
     * @return Alumno
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
     * Add profesorDni
     *
     * @param \AppBundle\Entity\Profesor $profesorDni
     *
     * @return Alumno
     */
    public function addProfesorDni(\AppBundle\Entity\Profesor $profesorDni)
    {
        $this->profesorDni[] = $profesorDni;

        return $this;
    }

    /**
     * Remove profesorDni
     *
     * @param \AppBundle\Entity\Profesor $profesorDni
     */
    public function removeProfesorDni(\AppBundle\Entity\Profesor $profesorDni)
    {
        $this->profesorDni->removeElement($profesorDni);
    }

    /**
     * Get profesorDni
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfesorDni()
    {
        return $this->profesorDni;
    }
}
