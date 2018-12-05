<?php

namespace Revendedor\Controller;

use Revendedor\Entity\FormularioCinta;
use Zend\Mvc\Controller\AbstractActionController;
use Cr\Entity\CantidadPrecio;
use Cr\Entity\Color;
use Cr\Entity\Dibujo;
use Zend\View\Model\JsonModel;
use ZfMetal\Security\Entity\User;

/**
 * PedidoCintaController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class PedidoCintaController extends AbstractActionController
{

    const ENTITY = '\\Revendedor\\Entity\\FormularioCinta';

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

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
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

    public function getUserRepository()
    {
        return $this->getEm()->getRepository(User::class);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function saveAction()
    {
        $formularioCinta = null;
        $result = array();
        $result["status"] = false;
        $id = $this->params("id");
        if ($id) {
            $formularioCinta = $this->getEntityFormularioCintaRepository()->find($id);
        }

        if (!$formularioCinta) {
            $formularioCinta = new FormularioCinta();
            $identity = $this->identity();
           $user= $this->getUserRepository()->find($identity->getId());
            $formularioCinta->setUsuario($user);
        }

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

            if ($data["colorFondo"]) {
                $colorFondo = $this->getEntityColorRepository()->find($data["colorFondo"]);
                if ($colorFondo) {
                    $formularioCinta->setColorFondo($colorFondo);
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

                $id= $formularioCinta->getId();
                $usuario = $formularioCinta->getUsuario()->getUsername();
                $this->mailManager()->setFrom("ci.sys.virtual@gmail.com");
                $this->mailManager()->addTo("cristian.cdi@gmail.com");
                $this->mailManager()->addTo("cristiansapir@hotmail.com");
                $this->mailManager()->setSubject("Grafica CR Print - Su pedido #".$id." de cinta fue cargado con exito");
                $this->mailManager()->setTemplate("revendedor/mail/nuevo-pedido",["formularioCinta" => $formularioCinta]);
                //$this->mailManager()->setBody("Se ha registrado un nuevo pedido con ID ". $id ." de revendedor del usuario ". $usuario);
                try {
                    $this->mailManager()->send();
                }catch (\Exception $e){
                $this->logger->err($e->getMessage());
                }

                $result["status"] = true;
            } catch (\Exception $e) {
                $result["msj"] = $e->getMessage();
            }

        }


        return new JsonModel($result);
    }

    public function pedidoAction()
    {
        $formularioCinta = null;
        $id = $this->params("id");
        if ($id) {
            $formularioCinta = $this->getEntityFormularioCintaRepository()->find($id);
        }

        if (!$formularioCinta) {
            $formularioCinta = new FormularioCinta();
            $user = $this->identity();
            $formularioCinta->setUsuario($user);
        }


        $config = array();
        $config["pedido"]["id"] = $formularioCinta->getId();
         $config["pedido"]["nombre"] = $formularioCinta->getNombre();


        if ($formularioCinta->getColor()) {
            $config["pedido"]["color"]["id"] = $formularioCinta->getColor()->getId();
            $config["pedido"]["color"]["nombre"] = $formularioCinta->getColor()->getNombre();
            $config["pedido"]["color"]["hexa"] = $formularioCinta->getColor()->getHexa();
        } else {

            $config["pedido"]["color"]["id"] = "";
            $config["pedido"]["color"]["nombre"] = "";
            $config["pedido"]["color"]["hexa"] = "";
        }

        if ($formularioCinta->getColorFondo()) {
            $config["pedido"]["colorFondo"]["id"] = $formularioCinta->getColorFondo()->getId();
            $config["pedido"]["colorFondo"]["nombre"] = $formularioCinta->getColorFondo()->getNombre();
            $config["pedido"]["colorFondo"]["hexa"] = $formularioCinta->getColorFondo()->getHexa();
        } else {

            $config["pedido"]["colorFondo"]["id"] = "";
            $config["pedido"]["colorFondo"]["nombre"] = "";
            $config["pedido"]["colorFondo"]["hexa"] = "";
        }

        if ($formularioCinta->getDibujo()) {
            $config["pedido"]["dibujo"]["id"] = $formularioCinta->getDibujo()->getId();
            $config["pedido"]["dibujo"]["nombre"] = $formularioCinta->getDibujo()->getNombre();
            $config["pedido"]["dibujo"]["src"] = $formularioCinta->getDibujo()->getImg_fp();
        } else {
            $config["pedido"]["dibujo"]["id"] = "";
            $config["pedido"]["dibujo"]["nombre"] = "";
            $config["pedido"]["dibujo"]["src"] = "";

        }

        if ($formularioCinta->getOpcion()) {
            $config["pedido"]["opcion"]["id"] = $formularioCinta->getOpcion()->getId();
        } else {
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

    }

    public function linkFailAction()
    {
        return [];
    }


}
