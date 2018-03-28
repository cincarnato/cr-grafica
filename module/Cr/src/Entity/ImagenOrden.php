<?php

namespace Cr\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ImagenOrden
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="cr_imagen_orden")
 * @ORM\Entity(repositoryClass="Cr\Repository\ImagenOrdenRepository")
 */
class ImagenOrden
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
     * @ORM\Column(type="string", length=200, unique=true, nullable=false,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\File")
     * @Annotation\Attributes({"type":"file"})
     * @Annotation\Options({"label":"img","absolutepath":"/var/www/cr-grafica/public/media/imagenes","webpath":"/media/imagenes",
     * "description":""})
     * @Annotation\Filter({"name":"filerenameupload",
     * "options":{"target":"/var/www/cr-grafica/public/media/imagenes","use_upload_name":1,"overwrite":1}})
     * @ORM\Column(type="string", length=0, unique=false, nullable=true, name="img")
     */
    public $img = null;

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

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getImg_ap()
    {
        return "/var/www/cr-grafica/public/media/imagenes";
    }

    public function getImg_wp()
    {
        return "/media/imagenes";
    }

    public function getImg_fp()
    {
        return "/media/imagenes".$this->img;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

