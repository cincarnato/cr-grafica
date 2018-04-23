<?php

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Configuracion',
                'detail' => '',
                'icon' => 'settings',
                'permission' => 'general-admin',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'Dibujos',
                        'detail' => '',
                        'icon' => 'collections',
                        'permission' => 'general-admin',
                        'route' => 'Cr/Dibujo/Grid',
                    ],
                    [
                        'label' => 'Color',
                        'detail' => '',
                        'icon' => 'color_lens',
                        'permission' => 'general-admin',
                        'route' => 'Cr/Color/Grid',
                    ],
                    [
                        'label' => 'Cantidad & Precio',
                        'detail' => '',
                        'icon' => 'attach_money',
                        'permission' => 'general-admin',
                        'route' => 'Cr/CantidadPrecio/Grid',
                    ],
                ],
            ],
            [
                'label' => 'Formulario Cinta',
                'detail' => '',
                'icon' => 'reorder',
                'permission' => 'general-admin',
                'route' => 'Cr/FormularioCinta/Grid',
            ],
            [
                'label' => 'Clientes',
                'detail' => '',
                'icon' => 'assignment_ind',
                'permission' => 'general-admin',
                'route' => 'Cr/cliente/Grid',
            ],
        ],
    ],
];