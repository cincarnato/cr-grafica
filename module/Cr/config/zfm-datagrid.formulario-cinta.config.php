<?php

return [
    'zf-metal-datagrid.custom' => [
        'cr-entity-formulariocinta' => [
            'gridId' => 'zfmdg_FormularioCinta',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \Cr\Entity\FormularioCinta::class,
                    'entityManager' => 'doctrine.entitymanager.orm_default',
                ],
            ],
            'formConfig' => [
                'columns' => \ZfMetal\Commons\Consts::COLUMNS_ONE,
                'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
                'groups' => [

                ],
            ],
            'columnsConfig' => [
                'id' => [
                    'displayName' => 'ID',
                    'priority' => 1
                ],
                'cliente' => [
                    'priority' => 2
                ],
                'idMercadoLibre' => [
                    'priority' => 3
                ],
                'dibujo' => [
                    'type' => 'relational',
                    'priority' => 4,
                    'hidden' => true
                ],
                'color' => [
                    'type' => 'relational',
                    'priority' => 5,
                    'hidden' => true
                ],
                'colorFondo' => [
                    'type' => 'relational',
                    'priority' => 5,
                    'hidden' => true
                ],
                'nombre' => [
                    'priority' => 6,
                    'hidden' => true
                ],
                'codigo' => [
                    'priority' => 10,
                    'hidden' => true
                ],
                'opcion' => [
                    'priority' => 7,
                    'hidden' => true
                ],
                'listo' =>[
                    'type' => 'boolean',
                    'valueWhenTrue' => '<span class="text-success">Listo</span>',
                    'valueWhenFalse' => '<span class="text-danger">Pendiente</span>'
                ]
            ],
            'crudConfig' => [
                'enable' => true,
                'displayName' => null,
                'add' => [
                    'enable' => true,
                    'class' => 'material-icons text-primary cursor-pointer',
                    'value' => 'add',
                ],
                'edit' => [
                    'enable' => true,
                    'class' => 'material-icons text-primary cursor-pointer',
                    'value' => 'mode_edit'
                ],
                'del' => [
                    'enable' => true,
                    'class' => 'material-icons text-danger cursor-pointer',
                    'value' => 'delete_sweep'
                ],
                'view' => [
                    'enable' => true,
                    'action' => 'href="/cr/formulario-cinta/view/{{id}}"',
                    'class' => 'material-icons text-success cursor-pointer',
                    'value' => 'view_list',
                ],
            ],
        ],
    ],
];