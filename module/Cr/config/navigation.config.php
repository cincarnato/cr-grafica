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
                        'label' => 'Opción & Precio',
                        'detail' => '',
                        'icon' => 'attach_money',
                        'permission' => 'general-admin',
                        'route' => 'Cr/CantidadPrecio/Grid',
                    ],
                ],
            ],
            [
                'label' => 'Formularios',
                'detail' => '',
                'icon' => 'reorder',
                'permission' => 'general-admin',
                'route' => 'Cr/FormularioCinta/Grid',
            ],
        ],
    ],
];