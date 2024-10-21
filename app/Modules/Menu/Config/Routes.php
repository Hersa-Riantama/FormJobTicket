<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group(
    '',
    ['namespace' => '\Modules\Menu\Controllers'],
    function ($routes) {
        $routes->get('dashboard', 'Menu::index');
        $routes->get('/', 'Menu::beranda');
        $routes->get('check-user-status', 'Menu::checkUserStatus');
        $routes->post('register-selection', 'Menu::registerSelection');
        $routes->get('koord', 'Menu::getKoord');
    }
);
