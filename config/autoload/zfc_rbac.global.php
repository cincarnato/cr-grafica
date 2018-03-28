<?php

return [
    'zfc_rbac' => [
        'guest_role' => 'invitado',
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'home*' => [ 'usuario', 'admin'],
                'Application*' => [ 'usuario', 'admin'],
            ]
        ],
    ]
];
