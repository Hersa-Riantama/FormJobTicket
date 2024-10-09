<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\User\Controllers'],
    function ($routes) {
        $routes->get('/', 'User::index');
    }
);

$routes->group(
    'api',
    ['namespace' => '\Modules\User\Controllers'],
    function ($routes) {
        $routes->get('user', 'User::tampil');
        $routes->post('verify_user/(:segment)', 'User::verifyUser/$1');
    }
);
