<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="provincia")
 * @ORM\Entity
 */
class Provincia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idprovincia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprovincia;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=50, nullable=false)
     */
    private $provincia;

    /**
     * @var string
     *
     * @ORM\Column(name="provinciaseo", type="string", length=50, nullable=false)
     */
    private $provinciaseo;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia3", type="string", length=3, nullable=true)
     */
    private $provincia3;



    /**
     * Get idprovincia
     *
     * @return integer
     */
    public function getIdprovincia()
    {
        return $this->idprovincia;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     *
     * @return Provincia
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
     * Set provinciaseo
     *
     * @param string $provinciaseo
     *
     * @return Provincia
     */
    public function setProvinciaseo($provinciaseo)
    {
        $this->provinciaseo = $provinciaseo;

        return $this;
    }

    /**
     * Get provinciaseo
     *
     * @return string
     */
    public function getProvinciaseo()
    {
        return $this->provinciaseo;
    }

    /**
     * Set provincia3
     *
     * @param string $provincia3
     *
     * @return Provincia
     */
    public function setProvincia3($provincia3)
    {
        $this->provincia3 = $provincia3;

        return $this;
    }

    /**
     * Get provincia3
     *
     * @return string
     */
    public function getProvincia3()
    {
        return $this->provincia3;
    }
    public function __toString(){
        return $this->provincia;
    }
}
