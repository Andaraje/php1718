<?php

namespace DoctrineClaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador")
 * @ORM\Entity
 */
class Jugador
{
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=16, nullable=false)
     */
    private $password;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Producto", inversedBy="jugadorEmail")
     * @ORM\JoinTable(name="jugador_has_producto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="jugador_email", referencedColumnName="email")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="producto_idProducto", referencedColumnName="idProducto")
     *   }
     * )
     */
    private $productoproducto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productoproducto = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

        /**
     * Set email
     *
     * @return Jugador
     */
    public function setEmail($email)
    {
        $this->email=$email;
        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Jugador
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add productoproducto
     *
     * @param \DoctrineClaseBundle\Entity\Producto $productoproducto
     *
     * @return Jugador
     */
    public function addProductoproducto(\DoctrineClaseBundle\Entity\Producto $productoproducto)
    {
        $this->productoproducto[] = $productoproducto;

        return $this;
    }

    /**
     * Remove productoproducto
     *
     * @param \DoctrineClaseBundle\Entity\Producto $productoproducto
     */
    public function removeProductoproducto(\DoctrineClaseBundle\Entity\Producto $productoproducto)
    {
        $this->productoproducto->removeElement($productoproducto);
    }

    /**
     * Get productoproducto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductoproducto()
    {
        return $this->productoproducto;
    }
}
