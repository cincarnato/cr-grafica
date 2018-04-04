<?php

return [
    'router' => [
        'routes' => [
            'Pedido' => [
                'type' => 'Segment',
                'mayTerminate' => true,
                'options' => [
                    'route' => '/pedido/:id',
                    'defaults' => [
                        'controller' => \Pedido\Controller\PedidoController::CLASS,
                        'action' => 'pedido',
                    ],
                ],
            ],
            'PedidoGuardar' => [
                'type' => 'Segment',
                'mayTerminate' => true,
                'options' => [
                    'route' => '/pedido/guardar/:id',
                    'defaults' => [
                        'controller' => \Pedido\Controller\PedidoController::CLASS,
                        'action' => 'save',
                    ],
                ],
            ],
        ],
    ],
];