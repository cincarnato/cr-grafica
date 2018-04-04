<?php

namespace Cr\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * FormularioCintaController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class FormularioCintaController extends AbstractActionController
{

    const ENTITY = '\\Cr\\Entity\\FormularioCinta';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    /**
     * @var \ZfMetal\Datagrid\Grid
     */
    public $grid = null;

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

    public function __construct(\Doctrine\ORM\EntityManager $em, \ZfMetal\Datagrid\Grid $grid)
    {
        $this->em = $em;
        $this->grid = $grid;
    }

    public function getGrid()
    {
        return $this->grid;
    }

    public function setGrid(\ZfMetal\Datagrid\Grid $grid)
    {
        $this->grid = $grid;
    }

    public function gridAction()
    {
        $hostName = "http://" . $_SERVER['SERVER_NAME'];
        $this->grid->addExtraColumn("link unico", "<a target='_blank' href='" . $hostName . "/pedido/{{codigo}}'>" . $hostName . "/pedido/{{codigo}}</a>", "right");



        $codigo = $this->randomString();

        $this->grid->getSource()->getEventManager()->attach("saveRecord_before", function ($e) use ($codigo) {
            $object = $e->getParams()["record"];
            $object->setCodigo($codigo);
        });


        $this->grid->prepare();



        return array("grid" => $this->grid);
    }

    private function randomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

