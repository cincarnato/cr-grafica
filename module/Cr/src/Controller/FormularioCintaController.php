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
      //  $hostName = $this->getRequest()->getHttpHost();
        $hostName = "http://".$_SERVER['SERVER_NAME'];
       // $hostName = (string) $this->url('home',array(),array('force_canonical' => true));
        $this->grid->addExtraColumn("Link","<a target='_blank' href='".$hostName."/pedido/{{id}}'>".$hostName."/pedido/{{id}}</a>","right");
        $this->grid->prepare();
        return array("grid" => $this->grid);
    }


}

