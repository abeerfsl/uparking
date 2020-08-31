<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
        ],
        'sup_admin' => [
            'users' => 'r,u',

        ],
        'user' => [
            'users' => 'c,r,u,d',

        ],
      /*  'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],*/
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
