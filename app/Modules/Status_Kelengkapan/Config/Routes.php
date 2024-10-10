<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\Status_Kelengkapan\Controllers'],
    function ($routes) {
        $routes->get('/', 'Status_Kelengkapan::index');
    }
);
