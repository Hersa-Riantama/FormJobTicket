<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group(
    '',
    ['namespace' => '\Modules\Auth\Controllers'],
    function ($routes) {
        $routes->get('login', 'Auth::login');
        $routes->post('login', 'Auth::Flogin');
        $routes->post('daftar', 'Auth::regis');
        $routes->get('daftar', 'Auth::daftar');
        $routes->get('logout', 'Auth::logout');
    }
);

$routes->group(
    '',
    ['namespace' => '\Modules\Menu\Controllers'],
    function ($routes) {
        $routes->get('dashboard', 'Menu::index');
        $routes->get('/', 'Menu::beranda');
        $routes->get('check-user-status', 'Menu::checkUserStatus');
        $routes->post('register-selection', 'Menu::registerSelection');
    }
);
