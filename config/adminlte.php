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

    'menu' => [
        ['text' => 'search', 'search' => true],
        ['text' => 'Dashboard', 'url' => '/', 'icon' => 'fas fa-home'],
        ['header' => 'Management'],
        ['text' => 'Users', 'url' => '/admin/users', 'icon' => 'fas fa-users'],
    ],
];
