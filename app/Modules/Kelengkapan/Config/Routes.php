<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\Kelengkapan\Controllers'],['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('/', 'Kelengkapan::index');
    }
);
