<?php

return array(
    'controllers' => array(
        'factories' => array(
            'Cr\\Controller\\ImagenOrdenController' => 'Cr\\Factory\\Controller\\ImagenOrdenControllerFactory',
            \Cr\Controller\DibujoController::class => \Cr\Factory\Controller\DibujoControllerFactory::class,
            \Cr\Controller\ColorController::class => \Cr\Factory\Controller\ColorControllerFactory::class,
            \Cr\Controller\MedidaController::class => \Cr\Factory\Controller\MedidaControllerFactory::class,
            \Cr\Controller\FormularioCintaController::class => \Cr\Factory\Controller\FormularioCintaControllerFactory::class,
            \Cr\Controller\CantidadPrecioController::class => \Cr\Factory\Controller\CantidadPrecioControllerFactory::class,
        ),
    ),
);