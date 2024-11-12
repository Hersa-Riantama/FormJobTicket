<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\Kategori\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('/', 'Kategori::index');
    }
);

$routes->group(
    '',
    ['namespace' => '\Modules\Kategori\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('kategori', 'Kategori::data_kategori');
        $routes->put('kategori/(:segment)', 'Kategori::update/$1');
        $routes->get('kategori/(:segment)', 'Kategori::show/$1');
        $routes->delete('kategori/(:segment)', 'Kategori::delete/$1');
    }
);
