<?php

namespace Cr\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * FormularioCintaControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class FormularioCintaControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "cr-entity-formulariocinta"]);
        return new \Cr\Controller\FormularioCintaController($em,$grid);
    }


}

