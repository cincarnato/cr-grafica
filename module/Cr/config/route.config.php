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
                        'controller' => \Cr\Controller\DibujoController::CLASS,
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
                                'controller' => 'Cr\\Controller\\ImagenOrdenController',
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
                                        'controller' => 'Cr\\Controller\\ImagenOrdenController',
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Dibujo' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/dibujo',
                            'defaults' => [
                                'controller' => \Cr\Controller\DibujoController::CLASS,
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
                                        'controller' => \Cr\Controller\DibujoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Color' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/color',
                            'defaults' => [
                                'controller' => \Cr\Controller\ColorController::CLASS,
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
                                        'controller' => \Cr\Controller\ColorController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'FormularioCinta' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/formulario-cinta',
                            'defaults' => [
                                'controller' => \Cr\Controller\FormularioCintaController::CLASS,
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
                                        'controller' => \Cr\Controller\FormularioCintaController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                            'View' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/view/:id',
                                    'defaults' => [
                                        'controller' => 'Cr\\Controller\\FormularioCintaController',
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CantidadPrecio' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cantidad-precio',
                            'defaults' => [
                                'controller' => \Cr\Controller\CantidadPrecioController::CLASS,
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
                                        'controller' => \Cr\Controller\CantidadPrecioController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'cliente' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/cliente',
                            'defaults' => [
                                'controller' => \Cr\Controller\clienteController::CLASS,
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
                                        'controller' => \Cr\Controller\clienteController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'FormularioCintaRevendedor' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/formulario-cinta-revendedor',
                            'defaults' => [
                                'controller' => \Cr\Controller\FormularioCintaRevendedorController::CLASS,
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
                                        'controller' => \Cr\Controller\FormularioCintaRevendedorController::CLASS,
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