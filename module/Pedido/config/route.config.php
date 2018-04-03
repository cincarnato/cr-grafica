<?php

return [
    'router' => [
        'routes' => [
            'Pedido' => [
                'type' => 'Literal',
                'mayTerminate' => true,
                'options' => [
                    'route' => '/pedido',
                    'defaults' => [
                        'controller' => \Pedido\Controller\PedidoController::CLASS,
                        'action' => 'pedido',
                    ],
                ],
            ],
        ],
    ],
];