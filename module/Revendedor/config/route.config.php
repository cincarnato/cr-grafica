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
                            'Finalizar' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/finalizar/:id',
                                    'defaults' => [
                                        'controller' => 'Revendedor\\Controller\\FormularioCintaController',
                                        'action' => 'finalizar',
                                    ],
                                ],
                            ],
                            'View' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/view/:id',
                                    'defaults' => [
                                        'controller' => \Revendedor\Controller\FormularioCintaController::CLASS,
                                        'action' => 'view',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'PedidoCinta' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/pedido-cinta',
                            'defaults' => [
                                'controller' => \Revendedor\Controller\PedidoCintaController::CLASS,
                                'action' => 'pedido',
                            ],
                        ],
                        'child_routes' => [
                            'Pedido' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/pedido[/:id]',
                                    'defaults' => [
                                        'controller' => \Revendedor\Controller\PedidoCintaController::CLASS,
                                        'action' => 'pedido',
                                    ],
                                ],
                            ],
                            'Save' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/save[/:id]',
                                    'defaults' => [
                                        'controller' => \Revendedor\Controller\PedidoCintaController::CLASS,
                                        'action' => 'save',
                                    ],
                                ],
                            ],
                            'LinkFail' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/link-fail',
                                    'defaults' => [
                                        'controller' => \Revendedor\Controller\PedidoCintaController::CLASS,
                                        'action' => 'linkFail',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Estado' => [
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/estado',
                            'defaults' => [
                                'controller' => \Revendedor\Controller\EstadoController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'type' => 'Literal',
                        'child_routes' => [
                            'Grid' => [
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \Revendedor\Controller\EstadoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                                'type' => 'Segment',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];