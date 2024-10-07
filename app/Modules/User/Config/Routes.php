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
    'data-user',
    ['namespace' => '\Modules\User\Controllers'],
    function ($routes) {
        $routes->get('/', 'User::data_user');
    }
);
