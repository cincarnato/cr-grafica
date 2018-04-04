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
        $id = $this->params("id");
        $formularioCinta = $this->getEntityFormularioCintaRepository()->find($id);
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
            try{
                $this->getEm()->persist($formularioCinta);
                $this->getEm()->flush();
                $result["status"] = true;
            }catch (\Exception $e){
                $result["msj"] = $e->getMessage();
            }

        }

        return new JsonModel($result);
    }

    public function pedidoAction()
    {
        $this->layout()->setTemplate('pedido/layout/layout');

        $id = $this->params("id");
        if ($id) {
            $formularioCinta = $this->getEntityFormularioCintaRepository()->find($id);

            $config = array();
            $config["id"] = $id;
            $config["cliente"] = ($formularioCinta->getCliente()) ? $formularioCinta->getCliente()->getNombre() : "";
            $config["idMercadoLibre"] = $formularioCinta->getIdMercadoLibre();
            $config["nombre"] = $formularioCinta->getNombre();

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

