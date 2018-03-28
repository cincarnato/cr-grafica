<?php

namespace Cr\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * FormularioCinta
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="cr_formulario_cinta")
 * @ORM\Entity(repositoryClass="Cr\Repository\FormularioCintaRepository")
 */
class FormularioCinta
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
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"dibujo","empty_option": "",
     * "target_class":"\Cr\Entity\Dibujo", "description":""})
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\Dibujo")
     * @ORM\JoinColumn(name="dibujo_id", referencedColumnName="id", nullable=true)
     */
    public $dibujo = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"color","empty_option": "",
     * "target_class":"\Cr\Entity\Color", "description":""})
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\Color")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id", nullable=true)
     */
    public $color = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"medida","empty_option": "",
     * "target_class":"\Cr\Entity\Medida", "description":""})
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\Medida")
     * @ORM\JoinColumn(name="medida_id", referencedColumnName="id", nullable=true)
     */
    public $medida = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"cantidad","empty_option": "",
     * "target_class":"\Cr\Entity\CantidadPrecio", "description":""})
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\CantidadPrecio")
     * @ORM\JoinColumn(name="cantidad_id", referencedColumnName="id", nullable=true)
     */
    public $cantidad = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"nombre", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"email", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="email")
     */
    public $email = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"telefono", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true,
     * name="telefono")
     */
    public $telefono = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDibujo()
    {
        return $this->dibujo;
    }

    public function setDibujo($dibujo)
    {
        $this->dibujo = $dibujo;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getMedida()
    {
        return $this->medida;
    }

    public function setMedida($medida)
    {
        $this->medida = $medida;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

