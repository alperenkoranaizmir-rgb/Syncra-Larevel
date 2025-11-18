<?php

return [
    'title' => env('APP_NAME', 'Syncra'),
    'title_prefix' => '',
    'title_postfix' => '',

    'logo' => '<b>Syncra</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',

    'layout_topnav' => false,
    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_profile_url' => true,

    'menu' => [
        ['text' => 'search', 'search' => true],
        ['text' => 'Dashboard', 'url' => '/', 'icon' => 'fas fa-home'],

        ['header' => 'Management'],
        [
            'text' => 'Users',
            'icon' => 'fas fa-users',
            'submenu' => [
                ['text' => 'All Users', 'url' => '/admin/users', 'icon' => 'fas fa-list', 'can' => 'manage users'],
                ['text' => 'Create User', 'url' => '/admin/users/create', 'icon' => 'fas fa-user-plus', 'can' => 'manage users'],
            ],
        ],
        [
            'text' => 'Access Control',
            'icon' => 'fas fa-user-shield',
            'submenu' => [
                ['text' => 'Roles', 'url' => '/admin/roles', 'icon' => 'fas fa-user-tag', 'can' => 'manage users'],
                ['text' => 'Permissions', 'url' => '/admin/permissions', 'icon' => 'fas fa-key', 'can' => 'manage users'],
            ],
        ],

        ['header' => 'Site'],
        ['text' => 'Profile', 'url' => '/profile', 'icon' => 'fas fa-id-badge'],
        ['text' => 'Settings', 'url' => '/settings', 'icon' => 'fas fa-cog', 'can' => 'manage content'],

        ['header' => 'Reports'],
        ['text' => 'Activity', 'url' => '/admin/reports/activity', 'icon' => 'fas fa-chart-line', 'can' => 'manage content'],

        ['header' => 'Links'],
        ['text' => 'Project Homepage', 'url' => 'https://example.com', 'icon' => 'fas fa-external-link-alt', 'target' => '_blank'],
    ],
    'right_sidebar' => false,
    'usermenu_profile_url' => '/profile',
    'usermenu_desc' => 'Company: Korana Yazılım',
];
