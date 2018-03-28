<?php

namespace Cr\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CantidadPrecio
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="cr_cantidad_precio")
 * @ORM\Entity(repositoryClass="Cr\Repository\CantidadPrecioRepository")
 */
class CantidadPrecio
{

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"ID", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=11, unique=false, nullable=false, name="id")
     */
    public $id = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"cantidad", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=true, nullable=false,
     * name="cantidad")
     */
    public $cantidad = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"precio", "description":"", "addon":""})
     * @Annotation\Validator({"name":"Float"})
     * @ORM\Column(type="decimal", scale=2, precision=11, unique=false, nullable=true,
     * name="precio")
     */
    public $precio = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function __toString()
    {
        return  (string) $this->cantidad;
    }


}

