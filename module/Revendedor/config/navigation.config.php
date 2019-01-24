<?php

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Revendedor',
                'detail' => '',
                'icon' => 'group_work',
                'permission' => 'reventa',
                'route' => 'Revendedor/FormularioCinta/Grid',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'Lista pedidos Cinta',
                        'detail' => '',
                        'icon' => 'reorder',
                        'permission' => 'reventa',
                        'route' => 'Revendedor/FormularioCinta/Grid',
                    ],
                    [
                        'label' => 'Nuevo Pedido Cinta',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'reventa',
                        'route' => 'Revendedor/PedidoCinta/Pedido',
                    ],
                    [
                        'label' => 'Estados',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Revendedor/Estado/Grid',
                    ],
                ],
            ],
        ],
    ],
];