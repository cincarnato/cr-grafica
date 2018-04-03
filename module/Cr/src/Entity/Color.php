<?php

namespace Cr\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Color
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="cr_color")
 * @ORM\Entity(repositoryClass="Cr\Repository\ColorRepository")
 */
class Color
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
     * @Annotation\Options({"label":"nombre", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=true, nullable=false,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"hexa", "description":"Debe ingresar el color en
     * formato hexadecimal. Ej: #000000 (Negro)", "addon":""})
     * @ORM\Column(type="string", length=10, unique=true, nullable=false, name="hexa")
     */
    public $hexa = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getHexa()
    {
        return $this->hexa;
    }

    public function setHexa($hexa)
    {
        $this->hexa = $hexa;
    }

    public function __toString()
    {
        return  (string) $this->nombre;
    }


}

