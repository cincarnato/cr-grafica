<?php

namespace Pedido\Controller;

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

    const ENTITY = '\\Cr\\Entity\\FormularioCinta';

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

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function pedidoAction()
    {
        return [];
    }


}

