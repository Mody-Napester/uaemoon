<?php

return [
    'public' => '',
    'default_password' => 123456789,
    'uuid_version' => 1,
    'use_https' => false,
    'authorized_users' => [1],
    'pagination' => 20,
    'langs' => [
        [
            'name' => 'English',
            'short_name' => 'en',
        ],
        [
            'name' => 'عربى',
            'short_name' => 'ar',
        ]

    ],
    'currencies' => ['EGP', 'USD'],
    'adv_type_expiration_days' => [
        1 => 3, // normal type expire after 3 days
        2 => 30, // featured type expire after 30 days
        3 => 30 // vip type expire after 30 days
    ]
];
