<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('/', 'Form::index');
    }
);

$routes->group(
    'api',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('form', 'Form::form');
        $routes->get('tampilbuku', 'Form::getBukuOptions');
        $routes->get('tampilbuku/(:segment)', 'Form::getBukuDetails/$1');
        $routes->post('form','Form::createForm');
    }
);

$routes->group(
    'api',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('listform', 'Form::data_form');
    }
);

