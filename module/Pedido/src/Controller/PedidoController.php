<?php

namespace Pedido\Controller;

use Cr\Entity\CantidadPrecio;
use Cr\Entity\Color;
use Cr\Entity\Dibujo;
use Cr\Entity\FormularioCinta;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

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

    public function getEntityFormularioCintaRepository()
    {
        return $this->getEm()->getRepository(FormularioCinta::class);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function saveAction()
    {
        $result = array();
        $result["status"] = false;
        $codigo = $this->params("codigo");
        if ($codigo) {
            $formularioCinta = $this->getEntityFormularioCintaRepository()->findOneByCodigo($codigo);
            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();

                if ($data["nombre"]) {
                    $formularioCinta->setNombre($data["nombre"]);
                }

                if ($data["color"]) {
                    $color = $this->getEntityColorRepository()->find($data["color"]);
                    if ($color) {
                        $formularioCinta->setColor($color);
                    }
                }

                if ($data["dibujo"]) {
                    $dibujo = $this->getEntityDibujoRepository()->find($data["dibujo"]);
                    if ($dibujo) {
                        $formularioCinta->setDibujo($dibujo);
                    }
                }

                if ($data["opcion"]) {
                    $opcion = $this->getEntityCantidadPrecioRepository()->find($data["opcion"]);
                    if ($opcion) {
                        $formularioCinta->setOpcion($opcion);
                    }
                }
                try {
                    $this->getEm()->persist($formularioCinta);
                    $this->getEm()->flush();
                    $result["status"] = true;
                } catch (\Exception $e) {
                    $result["msj"] = $e->getMessage();
                }

            }
        }

        return new JsonModel($result);
    }

    public function pedidoAction()
    {
        $this->layout()->setTemplate('pedido/layout/layout');

        $codigo = $this->params("codigo");
        if ($codigo) {
            $formularioCinta = $this->getEntityFormularioCintaRepository()->findOneByCodigo($codigo);

            $config = array();
            $config["pedido"]["id"] = $formularioCinta->getId();
            $config["pedido"]["cliente"] = ($formularioCinta->getCliente()) ? $formularioCinta->getCliente()->getNombre() : "";
            $config["pedido"]["idMercadoLibre"] = $formularioCinta->getIdMercadoLibre();
            $config["pedido"]["nombre"] = $formularioCinta->getNombre();
            $config["pedido"]["codigo"] = $formularioCinta->getCodigo();

            if ($formularioCinta->getColor()) {
                $config["pedido"]["color"]["id"] = $formularioCinta->getColor()->getId();
                $config["pedido"]["color"]["nombre"] = $formularioCinta->getColor()->getNombre();
                $config["pedido"]["color"]["hexa"] = $formularioCinta->getColor()->getHexa();
            }else{

                $config["pedido"]["color"]["id"] = "";
                $config["pedido"]["color"]["nombre"] = "";
                $config["pedido"]["color"]["hexa"] = "";
            }

            if ($formularioCinta->getDibujo()) {
                $config["pedido"]["dibujo"]["id"] = $formularioCinta->getDibujo()->getId();
                $config["pedido"]["dibujo"]["nombre"] = $formularioCinta->getDibujo()->getNombre();
                $config["pedido"]["dibujo"]["src"] = $formularioCinta->getDibujo()->getImg_fp();
            }else{
                $config["pedido"]["dibujo"]["id"] = "";
                $config["pedido"]["dibujo"]["nombre"] = "";
                $config["pedido"]["dibujo"]["src"] = "";

            }

            if ($formularioCinta->getOpcion()) {
                $config["pedido"]["opcion"]["id"] = $formularioCinta->getOpcion()->getId();
            }else{
                $config["pedido"]["opcion"]["id"] = "";

            }

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
        } else {
            return null;
        }
    }


}

