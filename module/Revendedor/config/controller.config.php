<?php

return array(
    'controllers' => array(
        'factories' => array(
            \Revendedor\Controller\FormularioCintaController::class => \Revendedor\Factory\Controller\FormularioCintaControllerFactory::class,
            \Revendedor\Controller\PedidoCintaController::class => \Revendedor\Factory\Controller\PedidoCintaControllerFactory::class,
            \Revendedor\Controller\EstadoController::class => \Revendedor\Factory\Controller\EstadoControllerFactory::class,
        ),
    ),
);