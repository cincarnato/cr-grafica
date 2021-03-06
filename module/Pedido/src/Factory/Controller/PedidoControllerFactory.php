<?php

namespace Pedido\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * PedidoControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class PedidoControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        return new \Pedido\Controller\PedidoController($em);
    }


}

