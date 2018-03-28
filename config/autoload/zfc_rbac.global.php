<?php

return [
    'zfc_rbac' => [
        'guest_role' => 'invitado',
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'home*' => ['invitado', 'usuario', 'admin'],
                'Application*' => ['invitado', 'usuario', 'admin'],
            ]
        ],
    ]
];
