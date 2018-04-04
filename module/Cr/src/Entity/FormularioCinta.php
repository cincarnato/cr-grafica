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
     * @Annotation\Exclude()
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\Dibujo")
     * @ORM\JoinColumn(name="dibujo_id", referencedColumnName="id", nullable=true)
     */
    public $dibujo = null;

    /**
     * @Annotation\Exclude()
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\Color")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id", nullable=true)
     */
    public $color = null;

    /**
     * @Annotation\Exclude()
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\CantidadPrecio")
     * @ORM\JoinColumn(name="opcion_id", referencedColumnName="id", nullable=true)
     */
    public $opcion = null;

    /**
     * @Annotation\Exclude()
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"cliente","empty_option": "",
     * "target_class":"\Cr\Entity\Cliente", "description":""})
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\Cliente")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", nullable=true)
     */
    public $cliente = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"ID Mercado Libre", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true,
     * name="id_mercado_libre")
     */
    public $idMercadoLibre = null;

    /**
     * @Annotation\Exclude()
     * @ORM\Column(type="string", length=10, unique=true, nullable=false,
     * name="codigo")
     */
    public $codigo = null;

    /**
     * @Annotation\Exclude()
     * @ORM\Column(type="boolean", nullable=true, name="listo")
     */
    public $listo = null;

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

    public function getOpcion()
    {
        return $this->opcion;
    }

    public function setOpcion($opcion)
    {
        $this->opcion = $opcion;
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

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function getIdMercadoLibre()
    {
        return $this->idMercadoLibre;
    }

    public function setIdMercadoLibre($idMercadoLibre)
    {
        $this->idMercadoLibre = $idMercadoLibre;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getListo()
    {
        return $this->listo;
    }

    public function setListo($listo)
    {
        $this->listo = $listo;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

