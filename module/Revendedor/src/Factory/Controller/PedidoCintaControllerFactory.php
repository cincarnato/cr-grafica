<?php

namespace Revendedor\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * PedidoCintaControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class PedidoCintaControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        return new \Revendedor\Controller\PedidoCintaController($em);
    }


}

