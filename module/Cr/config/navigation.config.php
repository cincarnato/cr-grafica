<?php

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Configuracion',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'Dibujos',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Cr/Dibujo/Grid',
                    ],
                    [
                        'label' => 'Color',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Cr/Color/Grid',
                    ],
                    [
                        'label' => 'Medida',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Cr/Medida/Grid',
                    ],
                ],
            ],
            [
                'label' => 'Formulario Cinta',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'route' => 'Cr/FormularioCinta/Grid',
            ],
        ],
    ],
];