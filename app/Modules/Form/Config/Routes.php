<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group(
    'index',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('/', 'Form::index');
    }
);

$routes->group(
    '',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('form', 'Form::form');
        $routes->get('tampilbuku', 'Form::getBukuOptions');
        $routes->get('tampilbuku/(:segment)', 'Form::getBukuDetails/$1');
        $routes->post('form', 'Form::createForm');
        $routes->get('detail/(:segment)', 'Form::detailForm/$1');
    }
);
$routes->post('/get-email', '\Modules\User\Controllers\User::getEmail');
$routes->post('/kategori', '\Modules\Kategori\Controllers\Kategori::getKategori');

$routes->group(
    '',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('listform', 'Form::data_form');
    }
);
