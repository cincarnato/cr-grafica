<?php

namespace Revendedor\Entity;

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
 * @ORM\Table(name="rev_formulario_cinta")
 * @ORM\Entity(repositoryClass="Revendedor\Repository\FormularioCintaRepository")
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
     * @Annotation\Options({"label":"Usuario","empty_option": "",
     * "target_class":"\ZfMetal\Security\Entity\User", "description":""})
     * @ORM\ManyToOne(targetEntity="\ZfMetal\Security\Entity\User")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", nullable=true)
     */
    public $usuario = null;

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
     * @Annotation\Options({"label":"Color de Fondo","empty_option": "",
     * "target_class":"\Cr\Entity\Color", "description":""})
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\Color")
     * @ORM\JoinColumn(name="color_fondo_id", referencedColumnName="id", nullable=true)
     */
    public $colorFondo = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Nombre", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Opcion","empty_option": "",
     * "target_class":"\Cr\Entity\CantidadPrecio", "description":""})
     * @ORM\ManyToOne(targetEntity="\Cr\Entity\CantidadPrecio")
     * @ORM\JoinColumn(name="opcion_id", referencedColumnName="id", nullable=true)
     */
    public $opcion = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Cliente Revendedor", "description":"",
     * "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="cliente_revendedor")
     */
    public $clienteRevendedor = null;

    /**
     * @Annotation\Exclude()
     * @ORM\Column(type="boolean", nullable=true, name="listo")
     */
    public $listo = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Estado","empty_option": "",
     * "target_class":"\Revendedor\Entity\Estado", "description":""})
     * @ORM\ManyToOne(targetEntity="\Revendedor\Entity\Estado")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id", nullable=true)
     */
    public $estado = null;

    /**
     * @Annotation\Type("Zend\Form\Element\File")
     * @Annotation\Attributes({"type":"file"})
     * @Annotation\Options({"label":"Dibujo
     * Personalizado","absolutepath":"./public/media/dibujos-personalizados","webpath":"/media/dibujos-personalizados",
     * "description":""})
     * @Annotation\Filter({"name":"filerenameupload",
     * "options":{"target":"./public/media/dibujos-personalizados","use_upload_name":1,"overwrite":1}})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="dibujo_personalizado")
     */
    public $dibujoPersonalizado = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
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

    public function getColorFondo()
    {
        return $this->colorFondo;
    }

    public function setColorFondo($colorFondo)
    {
        $this->colorFondo = $colorFondo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getOpcion()
    {
        return $this->opcion;
    }

    public function setOpcion($opcion)
    {
        $this->opcion = $opcion;
    }

    public function getClienteRevendedor()
    {
        return $this->clienteRevendedor;
    }

    public function setClienteRevendedor($clienteRevendedor)
    {
        $this->clienteRevendedor = $clienteRevendedor;
    }

    public function getListo()
    {
        return $this->listo;
    }

    public function setListo($listo)
    {
        $this->listo = $listo;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getDibujoPersonalizado()
    {
        return $this->dibujoPersonalizado;
    }

    public function setDibujoPersonalizado($dibujoPersonalizado)
    {
        $this->dibujoPersonalizado = $dibujoPersonalizado;
    }

    public function getDibujoPersonalizado_ap()
    {
        return "./public/media/dibujos-personalizados/";
    }

    public function getDibujoPersonalizado_wp()
    {
        return "/media/dibujos-personalizados/";
    }

    public function getDibujoPersonalizado_fp()
    {
        return "/media/dibujos-personalizados/".$this->dibujoPersonalizado;
    }

    public function __toString()
    {
        return (string) $this->nombre;
    }


}

