<?php

return [
    'router' => [
        'routes' => [
            'Cr' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/cr',
                    'defaults' => [
                        'controller' => \Cr\Controller\ImagenOrdenController::CLASS,
                        'action' => 'grid',
                    ],
                ],
                'child_routes' => [
                    'ImagenOrden' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/imagen-orden',
                            'defaults' => [
                                'controller' => \Cr\Controller\ImagenOrdenController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \Cr\Controller\ImagenOrdenController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];