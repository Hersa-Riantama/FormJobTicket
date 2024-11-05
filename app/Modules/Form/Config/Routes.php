<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group(
    'index',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('/', 'Form::index');
    }
);
// ['filter' => 'sessionCheck'],
$routes->group(
    '',
    ['namespace' => '\Modules\Form\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('form', 'Form::form');
        $routes->get('formc2', 'Form::index');
        $routes->get('tampilbuku', 'Form::getBukuOptions');
        $routes->get('tampilbuku/(:segment)', 'Form::getBukuDetails/$1');
        $routes->post('form', 'Form::createForm');
        $routes->post('updateForm/(:segment)', 'Form::updateForm/$1');
        $routes->post('approveTiket', 'Form::approveTicket');
        $routes->post('disapproveTicket', 'Form::disapproveTicket');
        $routes->post('approveOrderKoord', 'Form::approvedOrderKoord');
        $routes->post('disapproveOrderKoord', 'Form::disapprovedOrderKoord');
        $routes->post('approveAccKoord', 'Form::approvedAccKoord');
        $routes->post('disapprovedAccKoord', 'Form::disapprovedAccKoord');
        $routes->post('approved', 'Form::approveTicketD');
        $routes->get('detail/(:segment)', 'Form::detailForm/$1');
        $routes->delete('delete/(:segment)', 'Form::delete/$1');
    }
);
$routes->post('/get-email', '\Modules\User\Controllers\User::getEmail');
$routes->post('/kategori', '\Modules\Kategori\Controllers\Kategori::getKategori');

$routes->group(
    '',
    ['namespace' => '\Modules\Form\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('listform', 'Form::data_form');
    }
);
