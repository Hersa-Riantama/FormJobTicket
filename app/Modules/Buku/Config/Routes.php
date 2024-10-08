<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->group(
//     'data-buku',
//     ['namespace' => '\Modules\Buku\Controllers'],
//     function ($routes) {
//         $routes->get('/', 'Buku::data_buku');
//     }
// );
$routes->group('api', ['namespace' => '\Modules\Buku\Controllers'], function($routes) {
    $routes->get('buku', 'Buku::index');
    $routes->get('buku/(:segment)', 'Buku::show/$1');
    $routes->post('buku', 'Buku::create');
    $routes->put('buku/(:)', 'Buku::update/$1');
    $routes->delete('buku/(:segment)', 'Buku::delete/$1');
});
