<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group(
    'data-buku',
    ['namespace' => '\Modules\Buku\Controllers'],
    function ($routes) {
        $routes->get('/', 'Buku::data_buku');
    }
);
