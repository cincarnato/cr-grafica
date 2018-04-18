<?php

return [
    'zfc_rbac' => [
        'guest_role' => 'invitado',
       // 'protection_policy' => \ZfcRbac\Guard\GuardInterface::POLICY_DENY,
        'guards' => [
            \ZfcRbac\Guard\RouteGuard::class => [
                'home*' => [ 'usuario', 'admin'],
                'Application*' => [ 'usuario', 'admin'],
                'Pedido' => ['invitado', 'usuario', 'admin'],
            ],
            \ZfcRbac\Guard\RoutePermissionsGuard::class => [
                'Revendedor*' => ['reventa']
            ]
        ],
    ]
];
