<?php

namespace Cr\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Medida
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="cr_medida")
 * @ORM\Entity(repositoryClass="Cr\Repository\MedidaRepository")
 */
class Medida
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
     * @Annotation\Options({"label":"medida", "description":"", "addon":""})
     * @ORM\Column(type="string", length=5, unique=false, nullable=true, name="medida")
     */
    public $medida = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMedida()
    {
        return $this->medida;
    }

    public function setMedida($medida)
    {
        $this->medida = $medida;
    }

    public function __toString()
    {
        return  $this->medida;
    }


}

