<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\User\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('/', 'User::index');
    }
);

$routes->group(
    '',
    ['namespace' => '\Modules\User\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('user', 'User::tampil');
        $routes->post('verify_user/(:segment)', 'User::verifyUser/$1');
        $routes->put('suspend/(:segment)', 'User::suspendUser/$1');
        $routes->get('profil', 'User::profil');
        $routes->post('uploadAvatar', 'User::uploadAvatar');
    }
);
