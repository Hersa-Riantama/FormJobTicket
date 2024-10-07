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
    'form',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('/', 'Form::form');
    }
);

$routes->group(
    'data-form',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('/', 'Form::data_form');
    }
);
