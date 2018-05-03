<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poblacion
 *
 * @ORM\Table(name="poblacion", indexes={@ORM\Index(name="fk_poblacion_provincia1_idx", columns={"provincia_idprovincia"})})
 * @ORM\Entity
 */
class Poblacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idpoblacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpoblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=150, nullable=false)
     */
    private $poblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacionseo", type="string", length=150, nullable=false)
     */
    private $poblacionseo;

    /**
     * @var integer
     *
     * @ORM\Column(name="postal", type="integer", nullable=true)
     */
    private $postal;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="decimal", precision=9, scale=6, nullable=true)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="decimal", precision=9, scale=6, nullable=true)
     */
    private $longitud;

    /**
     * @var \Provincia
     *
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provincia_idprovincia", referencedColumnName="idprovincia")
     * })
     */
    private $provinciaprovincia;



    /**
     * Get idpoblacion
     *
     * @return integer
     */
    public function getIdpoblacion()
    {
        return $this->idpoblacion;
    }

    /**
     * Set poblacion
     *
     * @param string $poblacion
     *
     * @return Poblacion
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return string
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set poblacionseo
     *
     * @param string $poblacionseo
     *
     * @return Poblacion
     */
    public function setPoblacionseo($poblacionseo)
    {
        $this->poblacionseo = $poblacionseo;

        return $this;
    }

    /**
     * Get poblacionseo
     *
     * @return string
     */
    public function getPoblacionseo()
    {
        return $this->poblacionseo;
    }

    /**
     * Set postal
     *
     * @param integer $postal
     *
     * @return Poblacion
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get postal
     *
     * @return integer
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     *
     * @return Poblacion
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     *
     * @return Poblacion
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set provinciaprovincia
     *
     * @param \AppBundle\Entity\Provincia $provinciaprovincia
     *
     * @return Poblacion
     */
    public function setProvinciaprovincia(\AppBundle\Entity\Provincia $provinciaprovincia = null)
    {
        $this->provinciaprovincia = $provinciaprovincia;

        return $this;
    }

    /**
     * Get provinciaprovincia
     *
     * @return \AppBundle\Entity\Provincia
     */
    public function getProvinciaprovincia()
    {
        return $this->provinciaprovincia;
    }
    public function __toString(){
        return $this->poblacion;
    }
}
