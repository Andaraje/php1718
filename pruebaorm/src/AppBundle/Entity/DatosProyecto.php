<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DatosProyecto
 *
 * @ORM\Table(name="datos_proyecto", indexes={@ORM\Index(name="fk_Datos_proyecto_Alumno1_idx", columns={"Alumno_DNI"}), @ORM\Index(name="fk_Datos_proyecto_Proyecto1_idx", columns={"Proyecto_Nombre"}), @ORM\Index(name="fk_Datos_proyecto_Ensenianza1_idx", columns={"Ensenianza_Nombre"})})
 * @ORM\Entity
 */
class DatosProyecto
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
     * @var integer
     *
     * @ORM\Column(name="Curso", type="integer", nullable=false)
     */
    private $curso;

    /**
     * @var string
     *
     * @ORM\Column(name="Convocatoria", type="string", length=45, nullable=false)
     */
    private $convocatoria;

    /**
     * @var \Alumno
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Alumno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Alumno_DNI", referencedColumnName="DNI")
     * })
     */
    private $alumnoDni;

    /**
     * @var \Ensenianza
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Ensenianza")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ensenianza_Nombre", referencedColumnName="Nombre")
     * })
     */
    private $ensenianzaNombre;

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
     * Set id
     *
     * @param integer $id
     *
     * @return DatosProyecto
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
     * Set curso
     *
     * @param integer $curso
     *
     * @return DatosProyecto
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return integer
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set convocatoria
     *
     * @param string $convocatoria
     *
     * @return DatosProyecto
     */
    public function setConvocatoria($convocatoria)
    {
        $this->convocatoria = $convocatoria;

        return $this;
    }

    /**
     * Get convocatoria
     *
     * @return string
     */
    public function getConvocatoria()
    {
        return $this->convocatoria;
    }

    /**
     * Set alumnoDni
     *
     * @param \AppBundle\Entity\Alumno $alumnoDni
     *
     * @return DatosProyecto
     */
    public function setAlumnoDni(\AppBundle\Entity\Alumno $alumnoDni)
    {
        $this->alumnoDni = $alumnoDni;

        return $this;
    }

    /**
     * Get alumnoDni
     *
     * @return \AppBundle\Entity\Alumno
     */
    public function getAlumnoDni()
    {
        return $this->alumnoDni;
    }

    /**
     * Set ensenianzaNombre
     *
     * @param \AppBundle\Entity\Ensenianza $ensenianzaNombre
     *
     * @return DatosProyecto
     */
    public function setEnsenianzaNombre(\AppBundle\Entity\Ensenianza $ensenianzaNombre)
    {
        $this->ensenianzaNombre = $ensenianzaNombre;

        return $this;
    }

    /**
     * Get ensenianzaNombre
     *
     * @return \AppBundle\Entity\Ensenianza
     */
    public function getEnsenianzaNombre()
    {
        return $this->ensenianzaNombre;
    }

    /**
     * Set proyectoNombre
     *
     * @param \AppBundle\Entity\Proyecto $proyectoNombre
     *
     * @return DatosProyecto
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
