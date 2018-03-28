<?php

namespace Cr\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * ImagenOrdenControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ImagenOrdenControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "cr-entity-imagenorden"]);
        return new \Cr\Controller\ImagenOrdenController($em,$grid);
    }


}

