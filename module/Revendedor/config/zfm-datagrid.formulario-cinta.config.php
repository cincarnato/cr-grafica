<?php

return [
    'zf-metal-datagrid.custom' => [
        'revendedor-entity-formulariocinta' => [
            'gridId' => 'zfmdg_FormularioCinta',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \Revendedor\Entity\FormularioCinta::class,
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

                ],
                'codigo' => [
                    'priority' => 10,
                ],
                'opcion' => [
                    'priority' => 7,
                    'hidden' => true
                ],
                'clienteRevendedor' => [
                    'displayName' => 'Cliente Revendedor',
                    'priority' => 2,
                ],
            ],
            'crudConfig' => [
                'enable' => true,
                'displayName' => "Acciones",
                'add' => [
                    'enable' => false,
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
                    'action' => 'href="/revendedor/formulario-cinta/view/{{id}}"',
                    'class' => 'material-icons text-success cursor-pointer',
                    'value' => 'view_list',
                ],
            ],
        ],
    ],
];