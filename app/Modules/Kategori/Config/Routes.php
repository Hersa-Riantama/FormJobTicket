<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\Kategori\Controllers'],
    function ($routes) {
        $routes->get('/', 'Kategori::index');
    }
);

$routes->group(
    'api',
    ['namespace' => '\Modules\Kategori\Controllers'],
    function ($routes) {
        $routes->get('kategori', 'Kategori::data_kategori');
    }
);
