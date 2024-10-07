<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group(
    'dashboard',
    ['namespace' => '\Modules\Menu\Controllers'],
    function ($routes) {

        $routes->get('/', 'Menu::index');
    }
);
