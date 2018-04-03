<?php

namespace Pedido\Controller;

use Cr\Entity\CantidadPrecio;
use Cr\Entity\Color;
use Cr\Entity\Dibujo;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * PedidoController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class PedidoController extends AbstractActionController
{


    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityDibujoRepository()
    {
        return $this->getEm()->getRepository(Dibujo::class);
    }

    public function getEntityColorRepository()
    {
        return $this->getEm()->getRepository(Color::class);
    }

    public function getEntityCantidadPrecioRepository()
    {
        return $this->getEm()->getRepository(CantidadPrecio::class);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function pedidoAction()
    {
        $this->layout()->setTemplate('pedido/layout/layout');
        $config = array();
        $dibujosCollection = $this->getEntityDibujoRepository()->findAll();
        foreach ($dibujosCollection as $dibujo) {
            $d = array();
            $d["id"] = $dibujo->getId();
            $d["nombre"] = $dibujo->getNombre();
            $d["src"] = $dibujo->getImg_fp();
            $config["dibujos"][] = $d;
        }

        $coloresCollection = $this->getEntityColorRepository()->findAll();
        foreach ($coloresCollection as $color) {
            $d = array();
            $d["id"] = $color->getId();
            $d["nombre"] = $color->getNombre();
            $d["hexa"] = $color->getHexa();
            $config["colores"][] = $d;
        }

        $cantidadPrecioCollection = $this->getEntityCantidadPrecioRepository()->findAll();
        foreach ($cantidadPrecioCollection as $cp) {
            $d = array();
            $d["id"] = $cp->getId();
            $d["opcion"] = $cp->getOpcion();
            $d["precio"] = $cp->getPrecio();
            $config["opciones"][] = $d;
        }



        return ["config" => $config];
    }


}

