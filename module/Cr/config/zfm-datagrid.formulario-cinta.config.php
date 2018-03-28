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
                'dibujo' => [
                    'type' => 'relational',
                    'priority' => 4
                ],
                'color' => [
                    'type' => 'relational',
                    'priority' => 5
                ],
                'medida' => [
                    'type' => 'relational',
                    'priority' => 6
                ],
                'nombre' => [
                    'priority' => 2
                ],
                'cantidad' => [
                    'priority' => 3
                ],
                'email' => [
                    'hidden' => true,
                ],
                'telefono' => [
                    'hidden' => true,
                ],
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
                    'class' => 'material-icons text-success cursor-pointer',
                    'value' => 'view_list',
                ],
            ],
        ],
    ],
];