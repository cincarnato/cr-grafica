<?php

return [
    'zf-metal-datagrid.custom' => [
        'cr-entity-cliente' => [
            'gridId' => 'zfmdg_Cliente',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \Cr\Entity\Cliente::class,
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
                    'priority' => 0
                ],
                'nombre' => [
                    'priority' => 1
                ],
                'email' => [
                    'priority' => 2
                ],
                'telefono' => [
                    'priority' => 3
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