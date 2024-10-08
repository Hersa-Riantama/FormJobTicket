<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', ['namespace' => '\Modules\Auth\Controllers'], function($routes) {
    $routes->get('user','Auth::index');
    $routes->post('regis','Auth::regis');
    $routes->post('verify_user/(:num)', 'Auth::verifyUser/$1');
    $routes->post('login', 'Auth::login');
});

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
