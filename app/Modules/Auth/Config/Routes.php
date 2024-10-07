<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group(
    'login',
    ['namespace' => '\Modules\Auth\Controllers'],
    function ($routes) {
        $routes->get('/', 'Auth::login');
    }
);

$routes->group(
    'daftar',
    ['namespace' => '\Modules\Auth\Controllers'],
    function ($routes) {
        $routes->get('/', 'Auth::daftar');
    }
);
