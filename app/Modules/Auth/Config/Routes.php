<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group(
    'api',
    ['namespace' => '\Modules\Auth\Controllers'],
    function ($routes) {
        $routes->get('login', 'Auth::login');
        $routes->post('login', 'Auth::Flogin');
        $routes->post('daftar','Auth::regis');
        $routes->get('daftar', 'Auth::daftar');
    }
);
$routes->group(
    'api',
    ['namespace' => '\Modules\Menu\Controllers'],
    function ($routes) {
        $routes->get('dashboard', 'Menu::index');
    }
);
