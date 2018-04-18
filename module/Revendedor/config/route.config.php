<?php

return [
    'router' => [
        'routes' => [
            'Revendedor' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/revendedor',
                    'defaults' => [
                        'controller' => \Revendedor\Controller\FormularioCintaController::CLASS,
                        'action' => 'grid',
                    ],
                ],
                'child_routes' => [
                    'FormularioCinta' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/formulario-cinta',
                            'defaults' => [
                                'controller' => \Revendedor\Controller\FormularioCintaController::CLASS,
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
                                        'controller' => \Revendedor\Controller\FormularioCintaController::CLASS,
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